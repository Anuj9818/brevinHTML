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
	$dataSlogan=htmlentities(trim($_POST['slogan']), ENT_QUOTES);
	$dataAddress=htmlentities(trim($_POST['address']), ENT_QUOTES);
	$dataPhone=htmlentities(trim($_POST['phone']), ENT_QUOTES);
	$dataEmail=htmlentities(trim($_POST['email']), ENT_QUOTES);
	$dataDetails=htmlentities(trim($_POST['details']), ENT_QUOTES);

	$chk_exist="select * from contactus where id='$dataID'";
	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataID=="") {
		print "<script language=\"JavaScript\">
		alert (\"Data Does Not Exists Or Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update contactus set slogan='$dataSlogan', address='$dataAddress', phone='$dataPhone', email='$dataEmail', details='$dataDetails' where id='$dataID'";
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