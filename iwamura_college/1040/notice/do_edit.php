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
	$dataTitle=$_POST['title'];
	$dataDate=$_POST['added_date'];
	$dataDetails=htmlentities(trim($_POST['details']),ENT_QUOTES);

	$chk_exist="select * from notice where id='$dataID'";
	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataID=="" || $dataTitle=="" || $dataDate=="") {
		print "<script language=\"JavaScript\">
		alert (\"Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update notice set title='$dataTitle', details='$dataDetails', added_date='$dataDate' where id='$dataID'";
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