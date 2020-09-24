<?php
session_start();
require '../config.php';
require '../dbconnect.php';
require 'inc/functions.php';
require 'admin_logged_chk.php';

function clean($con, $str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysqli_real_escape_string($str);
}

$action=$_GET['action'];
settype($action, "string");

if ($action=="logging") {
	$usrEml=mysqli_real_escape_string($con, $_POST['email']);
	$usrPwd=mysqli_real_escape_string($con, $_POST['password']);

	if ($usrEml=="" || $usrPwd=="") {
		print "<script language=\"JavaScript\">
			alert (\"Some fields are missing.\");
			window.location=\"index.php\";
		</script>";
		exit();
	} else {
		$query1="select * from admined where adnEml='$usrEml' and adnPwd='$usrPwd'";
		$result1=mysqli_query($con, $query1);
		if (mysqli_num_rows($result1)==0) {
			print "<script language=\"JavaScript\">
				alert (\"No such data information found.\");
				window.location=\"index.php\";
			</script>";
			exit();
		} else {
			$_SESSION['adminUserEmail']=$usrEml;
			$_SESSION['sessionIP']=$_SERVER['REMOTE_ADDR'];
			print "<script language=\"JavaScript\">
				window.location=\"dashboard.php\";
			</script>";
			exit();
		}
	}
}

if ($stm_logged_state==1) {
	print "<script language=\"JavaScript\">
		window.location=\"dashboard.php\";
	</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Area</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<style>
	body { margin:0px; padding:0px; background:#ddd; font-family:Tahoma; font-size:14px; color:#333; }
	#loginBox { max-width:250px; margin:10% auto; padding:40px 0; border-radius:15px; border:10px solid #f8f8f8; text-align:center; background:#f2f2f2; }
	#loginBox h1 { margin:0 0 18px 0; padding:0px; font-size:20px; font-weight:normal; color:#888; }
	#loginBox h2 { margin:0 0 20px 0; padding:5px 0; font-size:18px; font-weight:normal; color:#dfdfdf; }
	.userInput { margin:0 0px 10px 0px; padding:0px; }
	.userInput input { width:80%; margin:0px; padding:3% 5%; border:1px  solid #ddd; font-size:13px; color:#333; }
	.userInput input:hover { border:1px  solid #777; }
	.userSubmit input { margin:10px 0 0 0; padding:8px 20px; font-size:14px; color:#777; }
	#footer { width:97%; margin:0px auto; padding:20px 0; clear:both; font-size:11px;  text-align:center; color:#ddd; }
</style>
</head>

<body>
<div id="loginBox">
	<h1>Admin Area</h1>
	<?php
	if ($action=="login" || ($action=="" && $stm_logged_state==0)) {
	?>
	<form name="admin" method="post" action="index.php?action=logging">
		<div class="userInput">
			<input type="email" name="email" id="email" maxlength="38" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter Email ID" required>
		</div>
		<div class="userInput">
			<input type="password" name="password" id="password" maxlength="20" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
		</div>
		<div class="userSubmit">
			<input type="submit" value="Login">
		</div>
	</form>
	<?php
		} else {
			print "<script language=\"JavaScript\">
				window.location=\"index.php\";
			</script>";
		}
		?>
</div>

</body>
</html>