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
	$data_id=$_GET['id'];
	$chk_exist="select * from alpine_training where id='$data_id'";
	$chk_exist_result=mysqli_query($con, $chk_exist);
	if (mysqli_num_rows($chk_exist_result)==0) {
		print "<script type=\"text/javascript\" language=\"JavaScript\">
		<!--
			alert (\"ERROR! Does not exist.\");
			window.location=\"index.php\";
		//-->
		</script>";
	} else {
		$a_row=mysqli_fetch_array($chk_exist_result);
		$dataImage=$a_row['image'];
		if ($dataImage=="") {
			mysqli_query ($con, "delete from alpine_training where id='$data_id'") or die("Could not delete data from database.");
			print "<script type=\"text/javascript\" language=\"JavaScript\">
			<!--
				alert (\"Deleted Successfully.\");
				window.location=\"index.php\";
			//-->
			</script>";
		} else {
			$remove_file=unlink("../../uploads/alpine_training/$dataImage");
			if ($remove_file==true) {
				mysqli_query ($con, "delete from alpine_training where id='$data_id'") or die("Could not delete data from database.");
				print "<script type=\"text/javascript\" language=\"JavaScript\">
				<!--
					alert (\"Deleted Successfully.\");
					window.location=\"index.php\";
				//-->
				</script>";
			} else {
				print "<script type=\"text/javascript\" language=\"JavaScript\">
				<!--
					alert (\"Unable to delete.\");
					history.back();
				//-->
				</script>";
			}
		}
	}
}
?>