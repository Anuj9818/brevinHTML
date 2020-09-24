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
	$post_admin_row_id=$_GET['id'];
	$chk_exist="select * from admin where id='$post_admin_row_id'";
	if (mysql_num_rows(mysql_query($chk_exist))==0 || $post_admin_row_id=="") {
		print "<script language=\"JavaScript\">
		alert (\"Admin Account Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$delete_data="delete from admin where id='$post_admin_row_id'";
		if (mysql_query($delete_data)==true) {
			print "<script language=\"JavaScript\">
			alert (\"Admin Account Successfully Deleted.\");
			window.location=\"index.php\";
			</script>";
		} else {
			print "<script language=\"JavaScript\">
			alert (\"Error Deleting Admin Account.\");
			history.back();
			</script>";

		}
	}
}
?>