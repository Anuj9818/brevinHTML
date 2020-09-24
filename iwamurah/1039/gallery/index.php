<?php
session_start();
require '../../config.php';
require '../../dbconnect.php';
require '../inc/functions.php';
require '../admin_logged_chk.php';

if ($stm_logged_state==0) {
	print "<script language=\"JavaScript\">
		window.location=\"../index.php?error=1\";
	</script>";
	exit();
}

$navigationSelected="galleryManagement";

$action=trim($_GET['action']);
$sub=trim($_GET['sub']);
$id=trim($_GET['id']);
$page=trim($_GET['page']);

function listOutAlbums($con, $selectedID="") {
	$dataTxt="";
	$getAlbums=mysqli_query($con, "select id, title from gallery_name order by id desc");
	while ($eachAlbum=mysqli_fetch_array($getAlbums)) {
		$dataID=$eachAlbum['id'];
		$dataTitle=$eachAlbum['title'];
		
		if ($selectedID==$dataID) {
			$selectedTxt=" selected";
		} else {
			$selectedTxt="";
		}

		$dataTxt.="<option value=\"$dataID\"$selectedTxt>$dataTitle</option>\n";

	}
	return $dataTxt;
}
?>
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


<table border="0" cellspacing="0" cellpadding="0" style="padding:0 20px;">
<tr>
	<td width="200" valign="top">
		<?php
			include("../inc/left_menu.php");
		?>
	</td>

	<td valign="top">
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
			<?php
			$col_1_a="#DEA998";
			$col_2_a="#C5D8E8";
			include ("gallery_top.inc"); 
			?>
			</td>
		</tr>
		<tr>
			<td>
			<?php
			if ($action=="album") {
				if ($sub=="manage") {
					print "<h3>Manage Albums.</h3>";

					$query1="select * from gallery_name order by id desc";
					$result1=mysqli_query($con, $query1);
					$totalrows=mysqli_num_rows($result1);
					if ($totalrows==0) {							
						print "<span class=\"error\">Album Doesn't Exist.</span>";
					} else {


						print "<script language=\"JavaScript\">
						function delData() {
							var confirmMsg=confirm('Are You Sure to Delete Selected Albums.');
							if (confirmMsg){
								document.myform.action = \"index.php?action=$action&sub=delete\";
								document.myform.submit();
							} else {
								return false;
							}
						}
						</script>
						<form name=\"myform\" method=\"post\">
						<table border=\"0\" cellpadding=\"8\" cellspacing=\"0\" class=\"contentTable\">
						<thead>
							<tr>
								<th><input type=\"checkbox\" onclick=\"selectAll('dataID[]');\"></th>
								<th scope=\"col\">Title</th>
								<th >Date</th>
								<th >Total Images</th>
								<th scope=\"col\">Action</th>
							</tr>
						</thead>";

						$rpp = 10; // results per page
						$adjacents = 10;

						$page = intval($_GET["page"]);
						if(!$page) $page = 1;

						$reload = "index.php?action=$action&sub=$sub&id=$id";

						// select appropriate results from DB:
						$result = mysqli_query($con, $query1);

						// count total number of appropriate listings:
						$tcount = mysqli_num_rows($result);

						// count number of pages:
						$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

						$count = 0;
						$i = ($page-1)*$rpp;
						while(($count<$rpp) && ($i<$tcount)) {
							mysqli_data_seek($result,$i);
							$query = mysqli_fetch_array($result);

							if ($i%2==0) {
								$rowAltHead="class=\"odd\"";
							} else {
								$rowAltHead="";
							}

							$dataID=$query['id'];
							$dataTitle=html_entity_decode($query['title']);
							$dataDate=$query['posted_date'];
							
							$getTotalImages=mysqli_num_rows(mysqli_query($con, "select * from gallery_image where gallery_id='$dataID'"));

							print "<tr $rowAltHead>
								<td><input type=\"checkbox\" name=\"dataID[]\" value=\"$dataID\" /></td>
								<td>$dataTitle</td>
								<td>$dataDate</td>
								<td>$getTotalImages</td>
								<td><a href=\"index.php?action=$action&sub=modify&id=$dataID\" class='remarkMenu'>Modify</a> <a href=\"index.php?action=photos&sub=manage&id=$dataID\" class='remarkMenu'>Manage Images</a> <a href=\"index.php?action=photos&sub=add&id=$dataID\" class='remarkMenu'>Add Images</a></td>
							</tr>";

							$i++;
							$count++;
						}

						print "<tfoot>
							<tr>
								<th colspan=\"5\"><input type=\"button\" value=\"Delete Data\" onClick=\"delData()\" /></th>
							</tr>
						</tfoot>
						</table>
						</form><br>";

						// call pagination function:
						print adminPagination($reload, $page, $tpages, $adjacents);

					}

				} elseif ($sub=="add") {
					print "<h3>Add New Album.</h3>";

					if ($_POST['cmd']=="addData") {

						$dataTitle=htmlentities(trim($_POST['dataTitle']), ENT_QUOTES);
						$dataDetails=htmlentities(trim($_POST['dataDetails']), ENT_QUOTES);
						$currentDate=date("Y-m-d");

						if ($dataTitle=="") {
							print "<p class=\"error\">Title is Missing.</p>";
							$displayForm=1;
						} else {
							$addData=mysqli_query($con, "insert into gallery_name values ('', '$dataTitle', '$dataDetails', '$currentDate')");
							if ($addData==true) {
								print "<p class=\"success\">Data Successfully Added.</p>";
								$displayForm=0;
							} else {
								print "<p class=\"error\">Error Adding Data to Database. Please Try again.</p>";
								$displayForm=1;
							}
						}

					} else {
						$displayForm=1;
					}

					if ($displayForm==1) {
			?>
						<h4>* Fields were mandatory.</h4>
						<form name="myform" method="post" action="index.php?action=album&sub=add">
							<input type="hidden" name="cmd" value="addData">
							<table class="adminBox">
							<tr>
								<th>Title: *</th>
								<td><input type="text" name="dataTitle" size="60" maxlength="100" value="<?php print $dataTitle; ?>"></td>
							</tr>
							<tr>
								<th>Details:</th>
								<td><textarea name="dataDetails" rows="5" cols="40"><?php print $dataDetails; ?></textarea></td>
							</tr>
							<tfoot>
								<tr>
									<th></th>
									<th><input type="submit" name="submit" value="Add"> <input type="reset" name="reset" value="Reset"></th>
								</tr>
							</tfoot>
							</table>
						</form>
			<?php
					}

				} elseif ($sub=="delete") {
					print "<h3>Delete Albums.</h3>";
					$dataID=$_POST['dataID'];
					if ($dataID=="") {
						print "<p class=\"error\">Nothing Posted for the Delete Action.</p>";
					} else {
						foreach ($dataID as $dataIDArray) {
							$checkDataExist=mysqli_query($con, "select * from gallery_name where id='$dataIDArray'");
							if (mysqli_num_rows($checkDataExist)==1) {

								$eachData=mysqli_fetch_array($checkDataExist);
								$title=htmlentities($eachData['title']);
								
								$checkDataExist=mysqli_query($con, "select * from gallery_image where gallery_id='$dataIDArray'");
								if (mysqli_num_rows($checkDataExist)>0) {
									print "<p class=\"error\">Error! Can not delete Album having <b>Title: $title</b> & <b>ID: $dataIDArray</b>. Data Exist on the Category.</p>";
								} else {
									$dataRemove=mysqli_query($con, "delete from gallery_name where id='$dataIDArray'");
									if ($dataRemove==true) {
										print "<p class=\"success\">Album having <b>Title: $title</b> & <b>ID: $dataIDArray</b> Successfully Removed.</p>";
									} else {
										print "<p class=\"error\">Error deleting Album having <b>Title: $title</b> & <b>ID: $dataIDArray</b>. Please Try Again.</p>";
									}
								}

							} else {
								print "<p class=\"error\">Album having ID <b>$dataIDArray</b> does not exist.</p>";
							}
						}
					}
				} elseif ($sub=="modify") {
					print "<h3>Modify Albums.</h3>";

					if ($_POST['cmd']=="doModify") {
						
						$dataID=trim($_POST['dataID']);
						$dataTitle=htmlentities(trim($_POST['dataTitle']), ENT_QUOTES);
						$dataDetails=htmlentities(trim($_POST['dataDetails']), ENT_QUOTES);

						if ($dataTitle=="") {
							print "<p class=\"error\">Title is Missing.</p>";
							$displayForm=1;
						} else {

							$updateListing=mysqli_query($con, "update gallery_name set title='$dataTitle', details='$dataDetails' where id='$dataID'");
							if ($updateListing==true) {
								print "<p class=\"success\">Album having ID <b>$dataID</b> Successfully updated.</p>";
							} else {
								print "<p class=\"error\">Error Updating Album having ID <b>$dataID</b></p>";
							}

						}

					} else {
						$dataID=$_GET['id'];
						$query=mysqli_query($con, "select * from gallery_name where id='$dataID'");						
						if ($dataID=="") {
							print "<span class=\"error\">Nothing Posted for Modify Sub-Action.</span>";
						} elseif (mysqli_num_rows($query)==0) {
							print "<span class=\"error\">Album Doesn't Exist.</span>";
						} else {
							$getDataDetails=mysqli_fetch_array($query);								
							$dataTitle=$getDataDetails['title'];
							$dataDetails=$getDataDetails['details'];
				?>
							<h4>* Fields were mandatory.</h4>
							<form name="myform" method="post" action="index.php?action=album&sub=modify&id=<?php print $dataID; ?>">
								<input type="hidden" name="cmd" value="doModify">
								<input type="hidden" name="dataID" value="<?php print $dataID; ?>">
								<table class="adminBox">
								<tr class="odd">
									<th>Title: *</th>
									<td><input type="text" name="dataTitle" size="60" maxlength="100" value="<?php print $dataTitle; ?>"></td>
								</tr>
								<tr class="odd">
									<th>Details:</th>
									<td><textarea name="dataDetails" rows="8" cols="80"><?php print $dataDetails; ?></textarea></td>
								</tr>
								<tfoot>
									<tr>
										<th></th>
										<th><input type="submit" name="submit" value="Update Data"> <input type="reset" name="reset" value="Reset"></th>
									</tr>
								</tfoot>
								</table>
							</form>
				<?php
						}
					}

				} else {
					print "<h3>ERROR!</h3>
					<span class=\"error\">Please select correct sub-action.</span>";
				}
			} elseif ($action=="photos") {
				if ($sub=="manage") {
					print "<h3>Manage Photos.</h3>";

					print "<h3><select onchange=\"if(options[selectedIndex].value) window.location.href='index.php?action=$action&sub=$sub&id='+(options[selectedIndex].value)\"><option value=\"0\">Select Album</option>";
					print listOutAlbums($con, $id);
					print "</select></h3>";

					$checkAlbumExist=mysqli_query($con, "select * from gallery_name where id='$id'");

					if ($id=="" || $id=="0" || mysqli_num_rows($checkAlbumExist)==0) {
						print "<span class=\"error\">Please Select Album.</span>";
					} else {
						$query1="select * from gallery_image where gallery_id='$id' order by id desc";
						$result1=mysqli_query($con, $query1);
						$totalrows=mysqli_num_rows($result1);
						if ($totalrows==0) {							
							print "<span class=\"error\">Images Doesn't Exist on Selected Album.</span>";
						} else {


							print "<script language=\"JavaScript\">
							function delData() {
								var confirmMsg=confirm('Are You Sure to Delete Selected Images.');
								if (confirmMsg){
									document.myform.action = \"index.php?action=$action&sub=delete\";
									document.myform.submit();
								} else {
									return false;
								}
							}
							</script>
							<form name=\"myform\" action=\"index.php?action=$action&sub=modify\" method=\"post\">
							<table class=\"table\">
							<thead>
								<tr>
									<th scope=\"col\"><input type=\"checkbox\" onclick=\"selectAll('dataID[]');\"></th>
									<th scope=\"col\">Image</th>
								</tr>
							</thead>";

							$rpp = 15; // results per page
							$adjacents = 8;

							$page = intval($_GET["page"]);
							if(!$page) $page = 1;

							$reload = "index.php?action=$action&sub=$sub&id=$id";

							// select appropriate results from DB:
							$result = mysqli_query($con, $query1);

							// count total number of appropriate listings:
							$tcount = mysqli_num_rows($result);

							// count number of pages:
							$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

							$count = 0;
							$i = ($page-1)*$rpp;
							while(($count<$rpp) && ($i<$tcount)) {
								mysqli_data_seek($result,$i);
								$query = mysqli_fetch_array($result);

								if ($i%2==0) {
									$rowAltHead="class=\"odd\"";
								} else {
									$rowAltHead="";
								}

								$dataID=$query['id'];
								$dataImage=$query['img_name'];
								
								print "<tr $rowAltHead>
									<th><input type=\"checkbox\" name=\"dataID[]\" value=\"$dataID\" /></th>
									<td><a href=\"../../uploads/gallery/$dataImage\" target=\"_blank\"><img src='$common_path/uploads/gallery/$dataImage' width='60' height='60' border='0' alt='$title'></a></td>
								</tr>";

								$i++;
								$count++;
							}

							print "<tfoot>
								<tr>
									<th colspan=\"2\"><input type=\"button\" value=\"Delete Data\" onClick=\"delData()\" /></th>
								</tr>
							</tfoot>
							</table>
							</form><br>";

							// call pagination function:
							print adminPagination($reload, $page, $tpages, $adjacents);

						}
					}

				} elseif ($sub=="add") {

					print "<h3>Add New Photos.</h3>";

					if ($_POST['cmd']=="addData") {

						$albumID=trim($_POST['albumID']);
						$checkAlbumExist=mysqli_query($con, "select * from gallery_name where id='$albumID'");
						if ($albumID=="") {
							print "<p class=\"error\">Album is Missing.</p>";
							$displayForm=1;
						} elseif (mysqli_num_rows($checkAlbumExist)=="0") {
							print "<p class=\"error\">ERROR! Selected Album Doesn't Exist.</p>";
							$displayForm=1;
						} else {
							$arrayLoop=-1;
							foreach ($_FILES['dataImage']['name'] as $key => $value) {
								$arrayLoop++;
								$randomPassword=makeRandomPassword(5,1);
								if (($_FILES["dataImage"]["type"][$key] == "image/jpg") || ($_FILES["dataImage"]["type"][$key] == "image/jpeg") || ($_FILES["dataImage"]["type"][$key] == "image/pjpeg")) {
									$imageFilename=$randomPassword.".jpg";
									$uploadImg=move_uploaded_file($_FILES['dataImage']['tmp_name'][$key], "../../uploads/gallery/tmp_$imageFilename");
									if ($uploadImg==true) {
										
										$sourcefile="../../uploads/gallery/tmp_$imageFilename";
										$destfile="../../uploads/gallery/$imageFilename";
										resizeImage_GD2('600', '600', $sourcefile, $destfile);
										unlink("../../uploads/gallery/tmp_$imageFilename");

										$addData=mysqli_query($con, "insert into gallery_image values ('', '$albumID', '$imageFilename')");
										if ($addData==true) {
											print "<p class=\"success\">Data Successfully Added.</p>";
											$displayForm=0;
										} else {
											unlink("../../uploads/gallery/$imageFilename");
											print "<p class=\"error\">Error Adding Data. Please Try again.</p>";
											$displayForm=0;
										}

									} else {
										print "<p class=\"error\">ERROR! Unable to Upload Image. Please Try again.</p>";
										$displayForm=0;
									}
								} else {
									print "<p class=\"error\">ERROR! Unsupported Image Format. Only JPG Images are allowed.</p>";
									$displayForm=0;
								}
							}
						}

					} else {
						$displayForm=1;
					}

					if ($displayForm==1) {
						
						if ($albumID=="" && $id!="") {
							$albumID=$id;
						}
			?>
						<h4>* Fields were mandatory.</h4>
						<form name="myform" enctype="multipart/form-data" method="post" action="index.php?action=photos&sub=add">
							<input type="hidden" name="cmd" value="addData">
							<table class="adminBox">
							<tr class="odd">
								<th>Album: *</th>
								<td>
									<select name="albumID">
										<option value="">Select Album</option>
										<?php
										print listOutAlbums($con, $albumID);
										?>
									</select>
								</td>
							</tr>
							<tr>
								<th valign="top">
									Photos: * <br> JPG, JPEG files allowed<br>
									W: 600px & H: 400px or opposite.
									<div style="margin-top: 5px;"><input type="button" value="Add New" onClick="addInput('dynamicInput');"></div>
								</th>
								<td>
									<div>
										<input type="file" name="dataImage[]" size="20">
									</div>
									<div id="dynamicInput"></div>
								</td>
							</tr>
							<tfoot>
								<tr>
									<th></th>
									<th><input type="submit" name="submit" value="Add Data"> <input type="reset" name="reset" value="Reset"></th>
								</tr>
							</tfoot>
							</table>
						</form>
			<?php
					}
				} elseif ($sub=="delete") {
					print "<h3>Delete Photos.</h3>";
					$photoID=$_POST['dataID'];
					if ($photoID=="") {
						print "<span class=\"error\">Nothing Posted for Delete Sub-Action.</span>";
					} else {
						foreach ($photoID as $photoIDArray) {
							$checkExist=mysqli_query($con, "select * from gallery_image where id='$photoIDArray'");
							if (mysqli_num_rows($checkExist)==0) {
								print "<p class=\"error\">Image Having ID: <b>$photoIDArray</b> doesn't Exist.</p>";
							} else {
								$getPhotoDetails=mysqli_fetch_array($checkExist);
								$dataImage=$getPhotoDetails['img_name'];

								$removeData=mysqli_query($con, "delete from gallery_image where id='$photoIDArray'");
								if ($removeData==true) {
									unlink("../../uploads/gallery/$dataImage");

									print "<p class=\"success\">Successfully Deleted Image having ID: <b>$photoIDArray</b>.</p>";
								} else {
									print "<p class=\"error\">Unable to Delete Image having ID: <b>$photoIDArray</b>.</p>";
								}
							}
						}
					}
				} else {
					print "<h3>ERROR!</h3>
					<span class=\"error\">Please select correct sub-action.</span>";
				}
			} else {
				print "<h3>ERROR!</h3>
				<span class=\"error\">Please select correct action.</span>";
			}
			?>
		</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<?php
include("../inc/footer.php");
?>
</body>
</html>