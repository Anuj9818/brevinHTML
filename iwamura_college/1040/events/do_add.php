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
	$dataTitle=$_POST['title'];
	$dataDate=$_POST['date'];
	$dataDetails=$_POST['details'];

	$chk_exist="select * from events where title='$dataTitle' and date='$dataDate' and details='$dataDetails'";
	if (mysql_num_rows(mysql_query($chk_exist))>=1 || $dataTitle=="" || $dataDate=="" || $dataDetails=="") {
		print "<script type=\"text/javascript\" language=\"JavaScript\">
		<!--
			alert (\"Data Already Exists Or Some Fields Are Missing.\");
			history.back();
		//-->.
		</script>";
	} else {
		$insert_data="insert into events (title, date, details) values ('$dataTitle','$dataDate', '$dataDetails')";
		if (mysql_query($insert_data)==true) {
			print "<script type=\"text/javascript\" language=\"JavaScript\">
			<!--
				alert (\"Data Successfully Added.\");
				window.location=\"index.php\";
			//-->
			</script>";
		} else {
			print "<script type=\"text/javascript\" language=\"JavaScript\">
			<!--
				alert (\"Error Adding Data.\");
				history.back();
			//-->
			</script>";
		}
	}
}
?>