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

$navigationSelected="popupManagement";
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

<table width="100%" bgcolor="#ffffff" border="0" cellspacing="0" cellpadding="0" style="padding:0 20px;">
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
		include ("popup_top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
		<h3>Popup Banner Management</h3>
		
			<?php
					$query="select * from popup order by id desc";
						$result=mysqli_query($con, $query);
						$totalrows=mysqli_num_rows($result);
						if ($totalrows==0) {							
							print "<span class=\"error\">Data Not Available.</span>";
						} else {


						print "<table width=\"100%\" border=\"0\" cellpadding=\"8\" cellspacing=\"0\" class=\"contentTable\">
							<thead><tr>
								<th>IMAGE</th>
								<th>ACTIVE</th>
								<th>REMARKS</th>
							</tr></thead>";


					$rpp = 10; // results per page
							$adjacents = 10;

							$page = intval($_GET["page"]);
							if(!$page) $page = 1;

							$reload = "index.php?id=$id";

							// select appropriate results from DB:
							$result = mysqli_query($con, $query);

							// count total number of appropriate listings:
							$tcount = mysqli_num_rows($result);

							// count number of pages:
							$tpage = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

							$count = 0;
							$i = ($page-1)*$rpp;
							while(($count<$rpp) && ($i<$tcount)) {
								mysqli_data_seek($result,$i);
								$each = mysqli_fetch_array($result);

								if ($i%2==0) {
									$rowAltHead="class=\"odd\"";
								} else {
									$rowAltHead="";
								}

								$dataID=$each['id'];
								$dataImage=$each['img_name'];
								$dataActive=$each['active'];

								print "<tr $rowAltHead>
											<td><img src='$common_path/uploads/popup/$dataImage' width='200px' border='0'></td>
											<td>$dataActive</td>
											
											<td><A href=\"popup_edit.php?id=$dataID\" title=\"EDIT\" class=\"remarkMenu\">EDIT</a> - <a href=\"popup_delete.php?id=$dataID\" onclick=\"return confirm('Are you sure?');\" title=\"DELETE\" class=\"remarkMenu\">DELETE</a></td>
										</tr>";

								$i++;
								$count++;
							}

							print "</table><br>";

							

							// call pagination function:
							print adminPagination($reload, $page, $tpage, $adjacents);
						}
					?>
				</td>
			</tr>
		</table>
		</td>
	</td>
</tr>
</table>

<?php
include("../inc/footer.php");
?>
</center>
</body>
</html>