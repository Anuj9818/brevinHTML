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
	$dataID=$_POST['id'];
	$dataTitle=$_POST['title'];
	$dataDate=$_POST['date'];
	$dataDetails=$_POST['details'];

	$chk_exist="select * from events where id='$dataID'";
	if (mysql_num_rows(mysql_query($chk_exist))==0 || $dataID=="" || $dataTitle=="" || $dataDate=="" || $dataDetails=="") {
		print "<script language=\"JavaScript\">
		alert (\"Data Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update events set title='$dataTitle', details='$dataDetails', date='$dataDate' where id='$dataID'";
		if (mysql_query($update_data)==true) {
			print "<script language=\"JavaScript\">
			alert (\"Data Successfully Updated.\");
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