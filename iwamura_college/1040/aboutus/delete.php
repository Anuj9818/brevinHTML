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
	$dataID=$_GET['id'];
	$chk_exist="select * from aboutus where id='$dataID'";
	if (mysqli_num_rows(mysqli_query($con, $chk_exist))==0 || $dataID=="") {
		print "<script language=\"JavaScript\">
		alert (\"Some Fields Are Missing.\");
		history.back();
		</script>";
	} else {
		$delete_data="delete from aboutus where id='$dataID'";
		if (mysqli_query($con, $delete_data)==true) {
			print "<script language=\"JavaScript\">
			alert (\"Page Successfully Deleted.\");
			window.location=\"index.php\";
			</script>";
		} else {
			print "<script language=\"JavaScript\">
			alert (\"Error Deleting Page.\");
			history.back();
			</script>";

		}
	}
}
?>
</center>
</body>
</html>