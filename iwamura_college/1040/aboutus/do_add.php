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
	$dataPosition=$_POST['position'];
	$dataDetails=htmlentities(trim($_POST['details']), ENT_QUOTES);

	if ($dataTitle=="" || $dataPosition=="") {
		print "<script type=\"text/javascript\" language=\"JavaScript\">
		<!--
			alert (\"Some Fields Are Missing.\");
			history.back();
		//-->.
		</script>";
	} else {
		$insert_data="insert into aboutus (title, position, details) values ('$dataTitle', '$dataPosition', '$dataDetails')";
		if (mysqli_query($con, $insert_data)==true) {
			print "<script type=\"text/javascript\" language=\"JavaScript\">
			<!--
				alert (\"Page Successfully Added.\");
				window.location=\"index.php\";
			//-->
			</script>";
		} else {
			print "<script type=\"text/javascript\" language=\"JavaScript\">
			<!--
				alert (\"Error Adding Page.\");
				history.back();
			//-->
			</script>";
		}
	}
	
}
?>