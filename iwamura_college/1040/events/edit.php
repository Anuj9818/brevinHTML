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

$navigationSelected="eventsManagement";

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
		<?php
		$post_id=$_GET['id'];
		$check_exist="select * from events where id='$post_id'";
		if (mysql_num_rows(mysql_query($check_exist))==0 || $post_id=="") {
			print "<script language=\"JavaScript\">
			alert (\"Data Does Not Exists Or Some Fields Are Missing.\");
			history.back();
			</script>";
		} else {
			$each_fields=mysql_fetch_array(mysql_query($check_exist));
			$dataID=$each_fields['id'];
			$dataTitle=$each_fields['title'];
			$dataDetails=$each_fields['details'];
			$dataDate=$each_fields['date'];
		?>
		<h3>Modify Events</h3>
		<h4>Please fill all fields.</h4>

		<form name="edit" method="post" action="do_edit.php">
		<table class="adminBox">
		<tr>
			<th>Title:</th>
			<td><input type="text" name="title" size="60" value="<?php print $dataTitle;?>"><input type="hidden" name="id" value="<?php print $dataID;?>"></td>
		</tr>
		<tr>
			<th>Date:</th>
			<td><input type="text" name="date" class="admin_login_text_box" size="20" value="<?php print $dataDate;?>"></td>
		</tr>
		<tr>
			<th>Details:</th>
			<td><textarea name="details" id="ckEditorNormal" rows="15" cols="80"><?php print $dataDetails;?></textarea></td>
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
	<?php
	}
	?>
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