<?php
session_start();
include("../../config.php");
include("../../dbconnect.php");
include('../admin_logged_chk.php');
if ($stm_logged_state==0) {
	print "<script type=\"text/javascript\" language=\"JavaScript\">
	<!--
		alert (\"Invalid Login.\");
		window.location=\"../index.php\";
	//-->
	</script>";
} else {
	$dataID=$_POST['id'];
	$dataCategory=$_POST['category'];
	$dataTitle=htmlentities(trim($_POST['title']), ENT_QUOTES);
	$dataPosition=$_POST['position'];
	$dataLink=htmlentities(trim($_POST['link']), ENT_QUOTES);

	$chk_exist="select * from clients where id='$dataID'";
	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataID=="" || $dataCategory=="" || $dataTitle=="" || $dataPosition=="") {
		print "<script language=\"JavaScript\">
		alert (\"Data Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update clients set category='$dataCategory', title='$dataTitle', position='$dataPosition', link='$dataLink' where id='$dataID'";
		if (mysqli_query($con, $update_data)==true) {
			print "<script language=\"JavaScript\">
			alert (\"Data Successfully Updated.\");
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