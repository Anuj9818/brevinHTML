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
	$dataDepartment=$_POST['department'];
	$dataName=htmlentities(trim($_POST['name']), ENT_QUOTES);
	$dataDesignation=htmlentities(trim($_POST['designation']), ENT_QUOTES);
	$dataQualification=htmlentities(trim($_POST['qualification']), ENT_QUOTES);
	$dataLicense=htmlentities(trim($_POST['license']), ENT_QUOTES);
	$dataPosition=$_POST['position'];

	$chk_exist="select * from doctors where id='$dataID'";
	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataDepartment=="" || $dataName=="" || $dataDesignation=="" || $dataQualification=="" || $dataPosition=="") {
		print "<script language=\"JavaScript\">
		alert (\"Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update doctors set department='$dataDepartment', name='$dataName', designation='$dataDesignation', qualification='$dataQualification', license='$dataLicense', position='$dataPosition' where id='$dataID'";
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