<?php
session_start();
include("../../config.php");
include("../../dbconnect.php");
require '../admin_logged_chk.php';

if ($stm_logged_state==0) {
	print "<script language=\"JavaScript\">
		window.location=\"../index.php?error=1\";
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
<?php include("../inc/header.php"); ?>

<?php include("../inc/menu_top.php"); ?>

<table border="0" cellspacing="0" cellpadding="0">
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
		
		<?php
		$post_admin_row_id=$_GET['id'];
		$chk_exist="select * from admin where id='$post_admin_row_id'";
		$chk_exist_result=mysql_query($chk_exist);
		if (mysql_num_rows($chk_exist_result)==0 || $post_admin_row_id=="") {
			print "<script language=\"JavaScript\">
			alert (\"Admin Account Does Not Exists Or Some Fields Are Missing.\");
			history.back();
			</script>";
		} else {
			$each_row=mysql_fetch_array($chk_exist_result);
			$db_admin_id=$each_row['admin_id'];
			$db_admin_password=$each_row['admin_password'];
		}
		?>
		<h3>Modify Admin Members</h3>
		<h4>All field required.</h4>
		<script language="JavaScript">
		<!--
		function valid_edit_admin() {
			if (edit_admin.edit_admin_pass.value=="") {
				alert("Admin Password Required.");
				edit_admin.edit_admin_pass.focus();
				return (false);
			} else if (edit_admin.edit_admin_pass.value!==edit_admin.con_edit_admin_pass.value) {
				alert("Admin Password Don\'t Match.");
				edit_admin.con_edit_admin_pass.focus();
				return (false);
			} else {
				return (true);
			}
		}
		//-->
		</script>
		<form name="edit_admin" method="post"  action="do_edit_admin.php" onSubmit="return valid_edit_admin()">
		<table class="adminBox">
		<tr>
			<th>ADMIN ID:&nbsp;</th>
			<td><b><?php print "$db_admin_id"; ?></b><input type="hidden" name="admin_id" value="<?php print "$db_admin_id"; ?>"></td>
		</tr>
		<tr>
			<th>NEW ADMIN PASSWORD:&nbsp;</th>
			<td><input type="password" name="edit_admin_pass" size="30"></td>
		</tr>
		<tr>
			<th>CONFIRM NEW ADMIN PASSWORD:&nbsp;</th>
			<td><input type="password" name="con_edit_admin_pass" size="30"></td>
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
</body>
</html>