<?php
session_start();
include("../../config.php");
include("../../dbconnect.php");
require '../inc/functions.php';
require '../admin_logged_chk.php';

if ($stm_logged_state==0) {
	print "<script language=\"JavaScript\">
		window.location=\"../index.php?error=1\";
	</script>";
	exit();
}

$navigationSelected="downloadManagement";

$action=trim($_GET['action']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<?php
require '../dataBTWNheadtags.php';
?>
</head>
<body>
<?php include("../inc/header.php"); ?>

<?php include("../inc/menu_top.php"); ?>

<table border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="200" valign="top">
	<?php
	include("../inc/left_menu.php");
	?>
	</td>
	<td valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<?php
		$col_1_a="#DEA998";
		$col_2_a="#C5D8E8";
		include ("news_top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td>
			<?php
						if ($action=="manage") {

							print "<h3>Manage Downloadable Files</h3>";
							$query="select * from downloads order by id desc";
							$checkDownloads=mysql_query($query);
							if (mysql_num_rows($checkDownloads)==0) {
								print "<div id=\"error\">Files Doesn't Exist</div>";
							} else {
								print "<script language=\"JavaScript\">
								function delData() {
									var confirmMsg=confirm('Are You Sure to Delete Selected Files.');
									if (confirmMsg){
										document.myform.action = \"index.php?action=delete\";
										document.myform.submit();
									} else {
										return false;
									}
								}
								</script>
								<form name=\"myform\" method=\"post\" action=\"index.php?action=modify\">
								<table border=\"0\" cellpadding=\"8\" cellspacing=\"0\" class=\"contentTable\">
								<thead>
									<tr>
										<th scope=\"col\"><input type=\"checkbox\" onclick=\"selectAll('dataID[]');\"></th>
										<th width=\"400px\" scope=\"col\" align=\"left\">Category</th>
										<th width=\"400px\" scope=\"col\" align=\"left\">Title</th>
										<th scope=\"col\">File</th>
									</tr>
								</thead>";

								$rpp = 10; // results per page
								$adjacents = 8;

								$page = intval($_GET["page"]);
								if(!$page) $page = 1;

								$reload = "index.php?action=manage";

								// select appropriate results from DB:
								$result = mysql_query($query);

								// count total number of appropriate listings:
								$tcount = mysql_num_rows($result);

								// count number of pages:
								$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

								$count = 0;
								$i = ($page-1)*$rpp;
								while(($count<$rpp) && ($i<$tcount)) {
									mysql_data_seek($result,$i);
									$query = mysql_fetch_array($result);

									$dataID=$query['id'];
									$dataCategory=$query['category'];
									$dataTitle=$query['title'];
									$dataFile=$query['filename'];

									if ($i%2==0) {
										$trClass="class=\"odd\"";
									} else {
										$trClass="";
									}

									print "<tr $rowAltHead>
										<td><input type=\"checkbox\" name=\"dataID[]\" value=\"$dataID\" /></td>
										<td>$dataCategory</td>
										<td>$dataTitle</td>
										<td><a href=\"../../downloads/$dataFile\" target=\"_blank\" class=\"remarkMenu\">View<a/></td>
									</tr>";

									$i++;
									$count++;
								}

								print "<tfoot>
									<tr>
										<td colspan=\"3\"><input type=\"submit\" value=\"Modify\"/> <input type=\"button\" value=\"Delete Files\" onClick=\"delData()\"/></td>
									</tr>
								</tfoot>
								</table>
								</form>";

								print "<div style=\"margin-top: 10px;\">";
								print adminPagination($reload, $page, $tpages, $adjacents);
								print "</div>";

							}


						} elseif ($action=="add") {
							
							print "<h3>Add Downloadable File</h3>";
							if ($_POST['cmd']=="addData") {
								$dataCategory=$_POST['dataCategory'];
								$dataTitle=htmlentities(trim($_POST['dataTitle']), ENT_QUOTES);
								if ($dataCategory=="" || $dataTitle=="" || $_FILES["dataFile"]["name"]=="") {
									print "<div id=\"error\">Some Mandatory Fields Were Missing.</div>";
									$displayForm=1;
								} else {
									$extension=getFileExtension($_FILES["dataFile"]["name"]);
									$randomPassword=makeRandomPassword(5,1);
									$fileName=$randomPassword.'.'.$extension;

									if ($extension=="doc" || $extension=="docx" || $extension=="pdf" || $extension=="xls" || $extension=="zip" || $extension=="rar") {
										$uploadFileAttachment=move_uploaded_file($_FILES['dataFile']['tmp_name'], "../../uploads/downloads/$fileName");
										if ($uploadFileAttachment==true) {
											$addData=mysql_query("insert into downloads values ('', '$dataCategory', '$dataTitle', '$fileName')");
											if ($addData==true) {
												print "<div id=\"success\">New File Successfully Added.</div>";
												$displayAddForm=0;
											} else {
												unlink("../../uploads/downloads/$fileName");
												print "<div id=\"error\">Error Adding New File. Please Try again.</div>";
												$displayForm=1;
											}
										} else {
											print "<div id=\"error\">Error Uploading File. Please Try again.</div>";
											$displayForm=1;
										}
									} else {
										print "<div id=\"error\">Wrong File Type. Please Use Correct File Type.</div>";
										$displayForm=1;
									}
								}
							} else {
								$displayForm=1;
							}
							if ($displayForm==1) {
						?>
								<h4>(*) Fields were mandatory.</h4>
								<form name="myform" enctype="multipart/form-data" method="post" action="index.php?action=add">
									<input type="hidden" name="cmd" value="addData">
									<table class="adminBox">
										<tr>
											<th>CATEGORY: *</th>
											<td><select name="dataCategory">
													<option value="<?php print $dataCategory; ?>">Select One</option>
													<option value="ICAN">ICAN</option>
													<option value="ICAI">ICAI</option>
												</select>
											</td>
										</tr>
										<tr class="odd">
											<th>Title: *</th>
											<td><input type="text" name="dataTitle" size="45" value="<?php print $dataTitle; ?>" class="txt"></td>
										</tr>
										<tr>
											<th>File: *</th>
											<td>
												<input type="file" name="dataFile" size="45">
												<div style="font-size:8pt; margin-top: 10px;">doc, docx, pdf, xls, zip, rar files only</div>
											</td>
										</tr>
										
										<tr>
											<th></th>
											<td><input type="submit" name="submit" value="Add File"/> <input type="reset" name="reset" value="Reset"/></td>
										</tr>
									</table>
								</form>
						<?php
							}

						} elseif ($action=="delete") {

							print "<h3>Delete Downloadable File</h3>";
							$fileID=$_POST['dataID'];
							if ($fileID=="") {
								print "<div id=\"error\">Nothing Posted for Delete Sub-Action.</div>";
							} else {
								foreach ($fileID as $fileIDArray) {
									$checkExist=mysql_query("select * from downloads where id='$fileIDArray'");
									if (mysql_num_rows($checkExist)==0) {
										print "<div id=\"error\">File Having <b>ID: $fileIDArray</b> doesn't Exist.</div>";
									} else {
										$fileDetails=mysql_fetch_array($checkExist);
										$dataTitle=$fileDetails['title'];
										$dataFile=$fileDetails['filename'];

										$deleteData=mysql_query("delete from downloads where id='$fileIDArray'");
										if ($deleteData==true) {
											unlink("../../uploads/downloads/".$dataFile);
											print "<div id=\"success\">File Having <b>Title: $dataTitle</b> & <b>ID: $fileIDArray</b> Successfully Deleted.</div>";
										} else {
											print "<div id=\"error\">ERROR! Unable to Delete File Having <b>Title: $dataTitle</b> & <b>ID: $fileIDArray</b>.</div>";
										}
									}
								}
							}

						} elseif ($action=="modify") {

							print "<h3>Modify Downloadable Files</h3>";
							if ($_POST['cmd']=="doModify") {

								$dataID=$_POST['dataID'];
								$dataCategory=$_POST['dataCategory'];
								$dataTitle=$_POST['dataTitle'];
								$oldDataFile=$_POST['oldDataFile'];
								$arrayLoop=-1;
								
								foreach ($_FILES['dataFile']['name'] as $key => $value) {
									$arrayLoop++;
									
									$array_dataID=trim($dataID[$arrayLoop]);
									$array_dataCategory=$dataCategory[$arrayLoop];
									$array_dataTitle=htmlentities(trim($dataTitle[$arrayLoop]), ENT_QUOTES);
									$array_oldDataFile=trim($oldDataFile[$arrayLoop]);

									if ($array_dataID=="" || $array_dataCategory=="" || $array_dataTitle=="" || $array_oldDataFile=="") {
										print "<div id=\"error\">Some Fields Were Missing.</div>";
									} else {

										$extension=getFileExtension($_FILES["dataFile"]["name"][$key]);
										$randomPassword=makeRandomPassword(5,1);
										$fileName=$randomPassword.'.'.$extension;

										if ($extension=="zip" || $extension=="doc" || $extension=="docx" || $extension=="xls" || $extension=="pdf") {
											
											$uploadFileAttachment=move_uploaded_file($_FILES['dataFile']['tmp_name'][$key], "../../uploads/downloads/$fileName");
											if ($uploadFileAttachment==true) {
												unlink("../../uploads/downloads/$array_oldDataFile");
												$newFileName="$fileName";
											} else {
												$newFileName=$array_oldDataFile;
											}
										} else {
											$newFileName=$array_oldDataFile;
										}

										$updateListing=mysql_query("update downloads set category='$array_dataCategory', title='$array_dataTitle', filename='$newFileName' where id='$array_dataID'");
										if ($updateListing==true) {
											print "<div id=\"success\">File Having ID <b>$array_dataID</b> Successfully updated.</div>";
										} else {
											print "<div id=\"error\">Error Updating File Having ID <b>$array_dataID</b>.</div>";
										}

									}
								}

							} else {
								$dataID=$_POST['dataID'];
								if ($dataID=="") {
									print "<div id=\"error\">Nothing Posted for Modify Sub-Action.</div>";
								} else {
									print "<form name=\"myform\" enctype=\"multipart/form-data\" action=\"index.php?action=modify\" method=\"post\">
									<input type=\"hidden\" name=\"cmd\" value=\"doModify\" />
									<table class=\"adminBox\">
									<thead>
										<tr>
											<th scope=\"col\">ID</th>
											<th scope=\"col\">Category *</th>
											<th scope=\"col\">Title *</th>
											<th scope=\"col\">File</th>
											<th scope=\"col\">Update File (Optional)</th>
										</tr>
									</thead>";
									$altRow=0;
									foreach ($dataID as $dataIDArray) {
										$altRow++;
										$checkExist=mysql_query("select * from downloads where id='$dataIDArray'");
										if (mysql_num_rows($checkExist)==1) {
											$dataDetails=mysql_fetch_array($checkExist);
											$dataCategory=$dataDetails['category'];
											$dataTitle=$dataDetails['title'];
											$dataFile=$dataDetails['filename'];

											if ($altRow%2==0) {
												$rowAltHead="class=\"odd\"";
											} else {
												$rowAltHead="";
											}

											print "<tr $rowAltHead>
												<td>$dataIDArray<input type=\"hidden\" name=\"dataID[]\" value=\"$dataIDArray\" /></td>
												<td><select name='dataCategory[]'>
													<option value='$dataCategory'>Select One</option>
													<option value='ICAN'>ICAN</option>
													<option value='ICAI'>ICAI</option>
												</select></td>
												<td><input type=\"text\" name=\"dataTitle[]\" value=\"$dataTitle\" size=\"50\" /></td>
												<td><a href=\"../../uploads/downloads/$dataFile\" target=\"_blank\">View File</a></td>
												<td>
													<input type=\"hidden\" name=\"oldDataFile[]\" value=\"$dataFile\" />
													<input type=\"file\" name=\"dataFile[]\" size=\"20\">
												</td>
											</tr>";
										}
									}
									print "<tfoot>
										<tr>
											<th colspan=\"3\"><input type=\"submit\" value=\"Update\"/> <input type=\"reset\" value=\"Reset\" /></th>
											<th style=\"font-size:8pt; margin-top: 10px;\">[doc, docx, pdf, xls files only]</th>
										</tr>
									</tfoot>
									</table>
									</form>";
								}
							}

						} else {
							print "<h1>ERROR!</h1>
							<div id=\"error\">Please select correct sub-action.</div>";
						}
						?>
			</td>
			</tr>
		</table>
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
<?php
include("../inc/footer.php");
?>
</center>
</body>
</html>