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

$navigationSelected="careersManagement";

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
		include ("top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<h3>Careers Management</h3>
				<?php
				$query1="select * from careers order by id desc";
					$result1=mysqli_query($con, $query1);
					$totalrows=mysqli_num_rows($result1);
					if ($totalrows==0) {							
						print "<span class=\"error\">No Data Added.</span>";
					} else {


						print "<table width=\"100%\" border=\"0\" cellpadding=\"8\" cellspacing=\"0\" class=\"contentTable\">
						<thead><tr>
					<th>Title</th>
					<th>Action</th>
				</tr></thead>";


				$rpp = 10; // results per page
						$adjacents = 10;

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

							$db_id=$query['id'];
							$dataTitle=html_entity_decode($query['title']);

							print "<tr $rowAltHead>
										<td>$dataTitle</td>
										<td><A href=\"edit.php?id=$db_id\" class=\"remarkMenu\" title=\"EDIT\">Edit</a></td>
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
	</td>
</tr>
</table>

<?php
include("../inc/footer.php");
?>
</body>
</html>


