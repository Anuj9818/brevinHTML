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
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<?php
		$col_1_a="#C5D8E8";
		$col_2_a="#DEA998";
		include ("admin_top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		<h3>Add New Admin Members</h3>
		<h4>Please fill all fields.</h4>
		<script language="JavaScript">
		<!--
		function valid_add_admin() {
			if (add_admin.new_admin_id.value=="") {
				alert("New Admin ID Required.");
				add_admin.new_admin_id.focus();
				return (false);
			} else if (add_admin.new_admin_id.value!==add_admin.con_new_admin_id.value) {
				alert("Admin ID Don\'t Match.");
				add_admin.con_new_admin_id.focus();
				return (false);
			} else if (add_admin.new_admin_pass.value=="") {
				alert("New Admin Password Required.");
				add_admin.new_admin_pass.focus();
				return (false);
			} else if (add_admin.new_admin_pass.value!==add_admin.con_new_admin_pass.value) {
				alert("Admin Password Don\'t Match.");
				add_admin.con_new_admin_pass.focus();
				return (false);
			} else {
				return (true);
			}
		}
		//-->
		</script>
		<form name="add_admin" method="post"  action="do_add_admin.php" onSubmit="return valid_add_admin()">
		<table class="adminBox">
		<tr>
			<th>NEW ADMIN ID:&nbsp;</th>
			<td><input type="text" name="new_admin_id" size="30"></td>
		</tr>
		<tr>
			<th>CONFIRM NEW ADMIN ID:&nbsp;</th>
			<td><input type="text" name="con_new_admin_id" size="30"></td>
		</tr>
		<tr>
			<th>NEW ADMIN PASSWORD:&nbsp;</th>
			<td><input type="password" name="new_admin_pass" size="30"></td>
		</tr>
		<tr>
			<th>CONFIRM NEW ADMIN PASSWORD:&nbsp;</th>
			<td><input type="password" name="con_new_admin_pass" size="30"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="submit" value="SUBMIT">&nbsp;<input type="reset" name="reset" value="RESET" class="admin_login_text_box"></td>
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