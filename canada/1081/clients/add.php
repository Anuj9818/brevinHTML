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

$navigationSelected="clientsManagement";

?>
<!DOCTYPE HTML>
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
		<h3>Add Data</h3>
		<h4>[*] are mandatory.</h4>
		<form name="add" method="post" enctype="multipart/form-data" action="do_add.php">
		<input type="hidden" name="cmd" value="addData">
		<table class="adminBox">
			<tr>
				<th>Category: *</th>
				<td><select name="category">
					<option value="">Select One</option>
					<option value="Colleges">Colleges</option>
					<option value="Universities">Universities</option>
				</select>
				</td>
			</tr>
			<tr>
				<th>Title: *</th>
				<td><input type="text" name="title" size="60"></td>
			</tr>
			<tr>
				<th>Image:</th>
				<td><input type="file" name="image" size="30"></td>
			</tr>
			<tr>
				<th>Link: *</th>
				<td><input type="text" name="link" size="60"></td>
			</tr>
			<tr>
				<th>Order: *</th>
				<td><input type="text" name="position" size="3" maxlength="2"></td>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" name="submit" value="Add Data">&nbsp;<input type="reset" name="reset" value="Reset"></td>
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