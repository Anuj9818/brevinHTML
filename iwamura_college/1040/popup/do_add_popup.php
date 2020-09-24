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

		$dataActive=$_POST['active'];
		
		if ($dataActive=="") {
			print "<script language=\"JavaScript\">
			alert (\"Some Fields Were Missing.\");
			window.location=\"index.php\";
			</script>";
		} else {

			if ($_FILES['img_name']['name']=="") {
				$thumbImgFile="";
			} else {
				if (($_FILES["img_name"]["type"] == "image/jpg") || ($_FILES["img_name"]["type"] == "image/jpeg") || ($_FILES["img_name"]["type"] == "image/png") || ($_FILES["img_name"]["type"] == "image/gif") || ($_FILES["img_name"]["type"] == "image/pjpeg")) {
					$randomPassword=makeRandomPassword(5,1);
					$filename=$randomPassword.'.jpg';
					$uploadImg=move_uploaded_file($_FILES['img_name']['tmp_name'], "../../uploads/popup/tmp_$filename");
					if ($uploadImg==true) {
						
						$sourcefile="../../uploads/popup/tmp_$filename";
						$destfile="../../uploads/popup/$filename";
						resizeImage_GD2('550', '550', $sourcefile, $destfile);
						unlink("../../uploads/popup/tmp_$filename");

						$thumbImgFile=$filename;

					} else {
						$thumbImgFile="";
					}


				}
			}
			$addData=mysqli_query($con, "insert into popup values ('', '$thumbImgFile', '$dataActive')");
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