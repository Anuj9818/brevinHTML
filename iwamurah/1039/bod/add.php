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

$navigationSelected="bodManagement";

?>
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
		$col_1_a="#C5D8E8";
		$col_2_a="#DEA998";
		include ("top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
		<h3>Add BOD profile</h3>
		<h4>Please fill all fields.</h4>
		<form name="add" enctype="multipart/form-data" method="post" action="do_add.php">
			<input type="hidden" name="cmd" value="addData">
			<table class="adminBox">
			<tr>
				<th>CATEGORY: </th>
				<td><select name="category">
						<option value="">Select one</option>
						<option value="Chairman">Chairman</option>
						<option value="Members">Members</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>IMAGE:</th>
				<td><input type="file" name="image" size="40"></td>
			</tr>
			<tr>
				<th>NAME:</th>
				<td><input type="text" name="name" size="70"></td>
			</tr>
			<tr>
				<th>DESIGNATION:</th>
				<td><input type="text" name="designation" size="30"></td>
			</tr>
			
			<tr>
				<th>ORDER:</th>
				<td><input type="text" name="position" size="4" maxlength="2"></td>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" name="submit" value="SUBMIT">&nbsp;<input type="reset" name="reset" value="RESET"></td>
			</tr>
			
			</table>
		</form>
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
<?php

	$ckeditor_init_id="ckeditor_replace";
	require '../inc/ckeditor_init.php';

?>
</body>
</html>