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
	$dataUrl=$_POST['url'];
	$dataDetails=$_POST['details'];

	if ($dataTitle=="" || $dataUrl=="") {
			print "<script language=\"JavaScript\">
			alert (\"Some Fields Were Missing.\");
			window.location=\"index.php\";
			</script>";
		} else {
			$addData=mysqli_query($con, "insert into video values ('', '$dataTitle','$dataUrl','$dataDetails')");
			if ($addData==true) {
				print "<script language=\"JavaScript\">
			alert (\"Data Successfully Added.\");
			window.location=\"index.php\";
			</script>";
			} else {
				print "<script language=\"JavaScript\">
			alert (\"Error Adding New Data. Please Try again.\");
			window.location=\"index.php\";
			</script>";

		}
	}
	
}
?>