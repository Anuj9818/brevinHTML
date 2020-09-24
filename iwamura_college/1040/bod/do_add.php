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

		$dataCategory=$_POST['category'];
		$dataName=htmlentities(trim($_POST['name']), ENT_QUOTES);
		$dataDesignation=htmlentities(trim($_POST['designation']), ENT_QUOTES);
		$dataPosition=$_POST['position'];
		

		if ($dataCategory=="" || $dataName=="" || $dataDesignation=="" || $dataPosition=="") {
			print "<script language=\"JavaScript\">
			alert (\"ERROR! Some Fields Are Missing.\");
			window.location=\"index.php\";
			</script>";
		} else {

			if ($_FILES['image']['name']=="") {
				$thumbImgFile="";
			} else {
				if (($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/pjpeg")) {
					$randomPassword=makeRandomPassword(5,1);
					$filename=$randomPassword.'.jpg';
					$uploadImg=move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/bod/tmp_$filename");
					if ($uploadImg==true) {
						
						$sourcefile="../../uploads/bod/tmp_$filename";
						$destfile="../../uploads/bod/$filename";
						resizeImage_GD2('200', '200', $sourcefile, $destfile);
						unlink("../../uploads/bod/tmp_$filename");

						$thumbImgFile=$filename;

					} else {
						$thumbImgFile="";
					}


				}
			}
			$addData=mysqli_query($con, "insert into bod values ('', '$dataCategory', '$dataName', '$dataDesignation', '$dataPosition', '$thumbImgFile')");
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