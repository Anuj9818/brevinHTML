<?php
session_start();
include("../../config.php");
include("../../dbconnect.php");
require '../admin_logged_chk.php';

if ($stm_logged_state==0) {
	print "<script language=\"JavaScript\">
		window.location=\"index.php?error=1\";
	</script>";
	exit();
}

$navigationSelected="adminManagement";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<?php
include("../inc/header.php");
?>
<?php

include("../inc/menu_top.php");
?>
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
		include ("admin_top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		<h3>Admin Members Management</h3>
		<table border="0" cellpadding="8" cellspacing="0" class="contentTable">
			<tr>
				<th>SN</th>
				<th>Admin ID</th>
				<th>Admin Password</th>
				<th align="center">Remarks</th>
			</tr>
			<?php
			$session=$_SESSION['SESS_ADMIN_ID'];
			$query1="select * from admin where admin_id='$session' order by id limit 1";
			$result1=mysql_query($query1);
			$i=0;
			while ($a_row=mysql_fetch_array($result1))
				{
					global $i;
					$i++;

					$dataID=$a_row['id'];
					$dataAdminID=html_entity_decode($a_row['admin_id']);
					$dataAdminPassword=html_entity_decode($a_row['admin_password']);
					print "<tr>
						<td>$i</td>
						<td>$dataAdminID</td>
						<td>$dataAdminPassword</td>
						<td><A href=\"admin_edit.php?id=$dataID\" class=\"remarkMenu\">Edit</a></td>
					</tr>";
					}
			?>
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