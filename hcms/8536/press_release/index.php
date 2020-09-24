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

$navigationSelected="pressReleaseManagement";

?>
<!DOCTYPE HTML>
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
		include ("top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
			<h3>Press Release</h3>
			
				
				<?php
				$query1="select * from press_release order by id desc";
					$result1=mysqli_query($con, $query1);
					$totalrows=mysqli_num_rows($result1);
					if ($totalrows==0) {							
						print "<span class=\"error\">No Data Exist.</span>";
					} else {


						print "<table border=\"0\" cellpadding=\"8\" cellspacing=\"0\" class=\"contentTable\">
						<thead><tr>
					<th>DATE</th>
					<th>IMAGE</th>
					<th>TITLE</th>
					<th>REMARKS</th>
				</tr></thead>";


				$rpp = 8; // results per page
						$adjacents = 8;

						$page = intval($_GET["page"]);
						if(!$page) $page = 1;

						$reload = "index.php?id=$id";

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
							$dataDate=$query['date'];
							$dataTitle=html_entity_decode($query['title']);
							$dataImage=$query['image'];

							print "<tr $rowAltHead>
										
										<td>$dataDate</td>
										<td><img src='$common_path/uploads/press_release/$dataImage' width='100px' border='0' alt='$dataTitle'></td>
										<td>$dataTitle</td>
										
										<td><A href=\"edit.php?id=$dataID\" class=\"remarkMenu\" title=\"EDIT\">Edit</a> - <a href=\"delete.php?id=$dataID\" class=\"remarkMenu\" title=\"DELETE\" onclick=\"return confirm('Are you sure?')\">Delete</a></td>
									</tr>";

							$i++;
							$count++;
						}

						print "</table><br>";

						

						// call pagination function:
						print adminPagination($reload, $page, $tpages, $adjacents);
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


