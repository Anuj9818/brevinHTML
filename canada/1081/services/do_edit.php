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
	$dataTitle=htmlentities(trim($_POST['title']), ENT_QUOTES);
	$dataDetails=htmlentities(trim($_POST['details']), ENT_QUOTES);
	$dataPosition=$_POST['position'];

	$chk_exist="select * from services where id='$dataID'";

	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataTitle=="" || $dataPosition=="") {
		print "<script language=\"JavaScript\">
		alert (\"ERROR! Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update services set title='$dataTitle', position='$dataPosition', details='$dataDetails' where id='$dataID'";
		if (mysqli_query($con, $update_data)==true) {
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