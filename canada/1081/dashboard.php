<?php
session_start();
require '../config.php';
require '../dbconnect.php';
require 'admin_logged_chk.php';

if ($stm_logged_state==0) {
	print "<script language=\"JavaScript\">
		window.location=\"index.php?error=1\";
	</script>";
	exit();
}

$navigationSelected="dashboard";

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Area</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include("inc/header.php"); ?>

<?php include("inc/menu_top.php"); ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0 20px;">
<tr>
	<td width="200" valign="top">
	<?php
	$navigationSelected="";
	include("inc/left_menu.php");
	?>
	</td>
	<td>
		<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td class="tbl_head" bgcolor="#e3e3e3" height="20" style="font:bold 16pt Arial; padding-left:4px; border:1px solid #c0c0c0;">
			Welcome <?php print $_SESSION['SESS_ADMIN_ID'];?> !</td>
		</tr>
		</table>
	</td>
</tr>
</table>



<?php
include("inc/footer.php");
?>
</center>
</body>
</html>