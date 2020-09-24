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
	$dataID=$_GET['id'];
	$chk_exist="select * from admissions where id='$dataID'";
	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataID=="") {
		print "<script language=\"JavaScript\">
		alert (\"Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$delete_data="delete from admissions where id='$dataID'";
		if (mysqli_query($con, $delete_data)==true) {
			print "<script language=\"JavaScript\">
			alert (\"Data Successfully Deleted.\");
			window.location=\"index.php\";
			</script>";
		} else {
			print "<script language=\"JavaScript\">
			alert (\"Error Deleting Data.\");
			history.back();
			</script>";

		}
	}
}
?>