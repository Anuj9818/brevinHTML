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
	if ($_POST['cmd']=="addData") {

		$dataTitle=htmlentities(trim($_POST['title']), ENT_QUOTES);
		$dataPosition=$_POST['position'];
		$dataDetails=htmlentities(trim($_POST['details']), ENT_QUOTES);		

		if ($dataTitle=="" || $dataPosition=="") {
			print "<script language=\"JavaScript\">
			alert (\"Some Fields Were Missing.\");
			window.location=\"index.php\";
			</script>";
		} else {

			$addData=mysqli_query($con, "insert into language_class values ('','$dataTitle','$dataPosition','$dataDetails')");
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
}
?>