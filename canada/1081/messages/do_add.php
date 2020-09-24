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

		$dataName=$_POST['name'];
		$dataDesignation=$_POST['designation'];
		$dataPosition=$_POST['position'];
		$dataDetails=htmlentities(trim($_POST['details']), ENT_QUOTES);		

		if ($dataName=="" || $dataDesignation=="" || $dataPosition=="") {
			print "<script language=\"JavaScript\">
			alert (\"Some Fields Were Missing.\");
			window.location=\"index.php\";
			</script>";
		} else {

			if ($_FILES['image']['name']=="") {
				$thumbImgFile="";
			} else {
				if (($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/pjpeg")) {
					$randomPassword=makeRandomPassword(5,1);
					$filename=$randomPassword.'.jpg';
					$uploadImg=move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/messages/tmp_$filename");
					if ($uploadImg==true) {
						
						$sourcefile="../../uploads/messages/tmp_$filename";
						$destfile="../../uploads/messages/$filename";
						resizeImage_GD2('870', '870', $sourcefile, $destfile);
						unlink("../../uploads/messages/tmp_$filename");

						$thumbImgFile=$filename;

					} else {
						$thumbImgFile="";
					}


				}
			}
			$addData=mysqli_query($con, "insert into messages values ('','$dataName', '$dataDesignation','$dataPosition','$thumbImgFile','$dataDetails')");
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