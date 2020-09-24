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
		$dataDetails=htmlentities(trim($_POST['details']), ENT_QUOTES);
		$dataDate=htmlentities(trim($_POST['posted_date']), ENT_QUOTES);

		if ($dataTitle=="" || $dataDate=="") {
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
					$uploadImg=move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/blog/tmp_$filename");
					if ($uploadImg==true) {
						
						$sourcefile="../../uploads/blog/tmp_$filename";
						$destfile="../../uploads/blog/$filename";
						resizeImage_GD2('1200', '1200', $sourcefile, $destfile);
						unlink("../../uploads/blog/tmp_$filename");

						$thumbImgFile=$filename;

					} else {
						$thumbImgFile="";
					}


				}
			}
			$addData=mysqli_query($con, "insert into blog values ('','$dataTitle', '$dataDate', '$dataDetails', '$thumbImgFile')");
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