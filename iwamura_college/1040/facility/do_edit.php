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
} else {
	$dataID=$_POST['id'];
	$dataTitle=$_POST['title'];
	$dataDetails=htmlentities(trim($_POST['details']), ENT_QUOTES);
	
	$chk_exist="select * from facility where id='$dataID'";

	if (mysql_num_rows(mysql_query($chk_exist))==0 || $dataTitle=="" || $dataDetails=="") {
		print "<script language=\"JavaScript\">
		alert (\"ERROR! Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update facility set title='$dataTitle', details='$dataDetails' where id='$dataID'";
		if (mysql_query($update_data)==true) {
			print "<script language=\"JavaScript\">
			alert (\"Data Updated Successfully.\");
			window.location=\"index.php\";
			</script>";
		} else {
			print "<script language=\"JavaScript\">
			alert (\"Error Updating Data.\");
			history.back();
			</script>";

		}
	}
}
?>