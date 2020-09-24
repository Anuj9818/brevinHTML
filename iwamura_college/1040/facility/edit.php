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

$navigationSelected="facilityManagement";

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

<table border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="150" valign="top">
	<?php
	include("../inc/left_menu.php");
	?>
	</td>
	<td valign="top">
	<table border="0" cellpadding="0" cellspacing="0">
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
		<?php
		$dataID=$_GET['id'];
		$chk_exist="select * from facility where id='$dataID'";
		$chk_exist_result=mysql_query($chk_exist);
		if (mysql_num_rows($chk_exist_result)==0 || $dataID=="") {
			print "<script language=\"JavaScript\">
			alert (\"Data Does Not Exists Or Some Fields Are Missing.\");
			history.back();
			</script>";
		} else {
			$each_row=mysql_fetch_array($chk_exist_result);
			$dataID=$each_row['id'];
			$dataTitle=$each_row['title'];
			$dataDetails=html_entity_decode($each_row['details']);
		}
		?>
		<h3>Modify Facility</h3>
		<h4>Please fill all fields.</h4>
		<form name="edit" method="post"  action="do_edit.php">
		<input type="hidden" name="id" value="<?php print "$dataID"; ?>">
		<table class="adminBox">
		<tr>
			<th>TITLE:*</th>
			<td><input type="text" name="title" size="70" value="<?php print "$dataTitle"; ?>"></td>
		</tr>
		<tr>
			<th>DETAILS:*</th>
			<td><textarea id="ckEditorNormal" name="details" rows="10" cols="45"><?php print "$dataDetails"; ?></textarea></td>
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