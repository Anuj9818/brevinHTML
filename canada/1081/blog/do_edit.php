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
	$dataDate=$_POST['posted_date'];

	$chk_exist="select * from blog where id='$dataID'";

	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataTitle=="" || $dataDate=="") {
		print "<script language=\"JavaScript\">
		alert (\"ERROR! Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update blog set title='$dataTitle', posted_date='$dataDate', details='$dataDetails' where id='$dataID'";
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