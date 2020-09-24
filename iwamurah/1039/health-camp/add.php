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

$navigationSelected="healthCampsManagement";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<?php
require '../dataBTWNheadtags.php';
$ckeditor_init_id="core";
require '../inc/ckeditor_init.php';
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
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<?php
		$col_1_a="#C5D8E8";
		$col_2_a="#DEA998";
		include ("top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		<h3>Add Data</h3>
		<h4>Please fill all fields.</h4>

		<form name="add" method="post" action="do_add.php">
		<table class="adminBox">
		<tr>
			<th>Title: *</th>
			<td><input type="text" name="title" size="60"></td>
		</tr>
		<tr>
			<th>Order: *</th>
			<td><input type="text" name="position" size="5"></td>
		</tr>
		<tr>
			<th>Details: </th>
			<td><textarea id="ckEditorNormal" name="details" cols="45" rows="10"></textarea></td>
		</tr>
		<tr>
			<th></th>
			<td class="tbl_data"><input type="submit" name="submit" value="SUBMIT" class="admin_login_text_box">&nbsp;<input type="reset" name="reset" value="RESET" class="admin_login_text_box"></td>
		</tr>
		</table>
		</form>
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
<?php

	$ckeditor_init_id="ckeditor_replace";
	require '../inc/ckeditor_init.php';

?>
</body>
</html>