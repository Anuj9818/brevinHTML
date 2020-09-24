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
		$dataTitle=htmlentities(trim($_POST['title']), ENT_QUOTES);
		$dataPosition=$_POST['position'];
		$dataLink=htmlentities(trim($_POST['link']), ENT_QUOTES);		

		if ($dataCategory=="" || $dataTitle=="" || $dataPosition=="" || $dataLink=="") {
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
					$uploadImg=move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/clients/tmp_$filename");
					if ($uploadImg==true) {
						
						$sourcefile="../../uploads/clients/tmp_$filename";
						$destfile="../../uploads/clients/$filename";
						resizeImage_GD2('600', '600', $sourcefile, $destfile);
						unlink("../../uploads/clients/tmp_$filename");

						$thumbImgFile=$filename;

					} else {
						$thumbImgFile="";
					}


				}
			}
			$addData=mysqli_query($con, "insert into clients values ('','$dataCategory','$dataTitle','$dataLink','$dataPosition','$thumbImgFile')");
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