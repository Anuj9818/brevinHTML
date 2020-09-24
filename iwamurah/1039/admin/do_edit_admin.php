<?php
session_start();
include("../../config.php");
include("../../dbconnect.php");
include('../admin_logged_chk.php');
if ($stm_logged_state==0) {
	print "<script type=\"text/javascript\" language=\"JavaScript\">
	<!--
		alert (\"Invalid Login.\");
		window.location=\"../index.php\";
	//-->
	</script>";
} else {
	$post_admin_id=$_POST['admin_id'];
	$post_admin_password=$_POST['edit_admin_pass'];
	$chk_exist="select * from admin where admin_id='$post_admin_id'";
	if (mysql_num_rows(mysql_query($chk_exist))==0 || $post_admin_id=="" || $post_admin_password=="") {
		print "<script language=\"JavaScript\">
		alert (\"Admin Account Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update admin set admin_password='$post_admin_password' where admin_id='$post_admin_id'";
		if (mysql_query($update_data)==true) {
			print "<script language=\"JavaScript\">
			alert (\"Admin Account Successfully Updated.\");
			window.location=\"index.php\";
			</script>";
		} else {
			print "<script language=\"JavaScript\">
			alert (\"Error Updating Admin Account.\");
			history.back();
			</script>";

		}
	}
}
?>