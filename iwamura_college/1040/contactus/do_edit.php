<?php
session_start();
include("../../config.php");
include("../../dbconnect.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<center>
<?php
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
	$dataDetails=htmlentities(trim($_POST['details']), ENT_QUOTES);

	$chk_exist="select * from contactus where id='$dataID'";
	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataID=="" || $dataDetails=="") {
		print "<script language=\"JavaScript\">
		alert (\"Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$update_data="update contactus set details='$dataDetails' where id='$dataID'";
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
</center>
</body>
</html>