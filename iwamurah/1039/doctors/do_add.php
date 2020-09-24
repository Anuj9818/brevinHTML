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

		$dataDepartment=$_POST['department'];
		$dataName=htmlentities(trim($_POST['name']), ENT_QUOTES);
		$dataDesignation=htmlentities(trim($_POST['designation']), ENT_QUOTES);
		$dataQualification=htmlentities(trim($_POST['qualification']), ENT_QUOTES);
		$dataLicense=htmlentities(trim($_POST['license']), ENT_QUOTES);
		$dataPosition=$_POST['position'];
		

		if ($dataDepartment=="" || $dataName=="" || $dataDesignation=="" || $dataQualification=="" || $dataLicense=="" || $dataPosition=="") {
			print "<script language=\"JavaScript\">
			alert (\"Some Fields Are Missing.\");
			window.location=\"index.php\";
			</script>";
		} else {

			if ($_FILES['image']['name']=="") {
				$thumbImgFile="";
			} else {
				if (($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg")) {
					$randomPassword=makeRandomPassword(5,1);
					$filename=$randomPassword.'.jpg';
					$uploadImg=move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/doctors/tmp_$filename");
					if ($uploadImg==true) {
						
						$sourcefile="../../uploads/doctors/tmp_$filename";
						$destfile="../../uploads/doctors/$filename";
						resizeImage_GD2('200', '200', $sourcefile, $destfile);
						unlink("../../uploads/doctors/tmp_$filename");

						$thumbImgFile=$filename;

					} else {
						$thumbImgFile="";
					}


				}
			}
			$addData=mysqli_query($con, "insert into doctors values ('', '$dataDepartment', '$dataName', '$dataDesignation', '$dataQualification', '$dataLicense', '$dataPosition', '$thumbImgFile')");
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