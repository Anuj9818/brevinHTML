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
	$dataID=$_GET['id'];
	$chk_exist="select * from facility where id='$dataID'";
	if (mysql_num_rows(mysql_query($chk_exist))==0 || $dataID=="") {
		print "<script language=\"JavaScript\">
		alert (\"Data Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$delete_data="delete from facility where id='$dataID'";
		if (mysql_query($delete_data)==true) {
			print "<script language=\"JavaScript\">
			alert (\"Data Successfully Deleted.\");
			window.location=\"index.php\";
			</script>";
		} else {
			print "<script language=\"JavaScript\">
			alert (\"Error Deleting Data.\");
			history.back();
			</script>";

		}
	}
}
?>