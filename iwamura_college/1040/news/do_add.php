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
	$dataDate=$_POST['added_date'];
	$dataDetails=htmlentities(trim($_POST['details']),ENT_QUOTES);
	
	if ($dataTitle=="" || $dataDate=="") {
		print "<script type=\"text/javascript\" language=\"JavaScript\">
		<!--
			alert (\"Data Already Exists Or Some Fields Are Missing.\");
			history.back();
		//-->.
		</script>";
	} else {
		$insert_data="insert into news (title, added_date, details) values ('$dataTitle', '$dataDate', '$dataDetails')";
		if (mysqli_query($con, $insert_data)==true) {
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