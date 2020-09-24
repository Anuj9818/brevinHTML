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
	$post_admin_id=htmlentities(trim($_POST['new_admin_id']), ENT_QUOTES);
	$post_admin_pass=htmlentities(trim($_POST['new_admin_pass']), ENT_QUOTES);

	$chk_exist="select * from admin where admin_id='$new_admin_id' and admin_password='$new_admin_pass'";
	if (mysql_num_rows(mysql_query($chk_exist))!==0 || $post_admin_id=="" || $post_admin_pass=="") {
		print "<script type=\"text/javascript\" language=\"JavaScript\">
		<!--
			alert (\"Admin Account Already Exists Or Some Fields Are Missing.\");
			history.back();
		//-->
		</script>";
	} else {
		$insert_data="insert into admin (admin_id, admin_password) values ('$post_admin_id','$post_admin_pass')";
		if (mysql_query($insert_data)==true) {
			print "<script type=\"text/javascript\" language=\"JavaScript\">
			<!--
				alert (\"Admin Account Successfully Added.\");
				window.location=\"index.php\";
			//-->
			</script>";
		} else {
			print "<script type=\"text/javascript\" language=\"JavaScript\">
			<!--
				alert (\"Error Adding Admin Account.\");
				history.back();
			//-->
			</script>";
		}
	}
}
?>