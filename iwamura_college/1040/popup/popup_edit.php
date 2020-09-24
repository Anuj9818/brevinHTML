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
}

$navigationSelected="popupManagement";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<?php include("../inc/header.php"); ?>

<?php include("../inc/menu_top.php"); ?>

<table border="0" cellspacing="0" cellpadding="0" style="padding:0 20px;">
<tr>
	<td width="200" valign="top">
	<?php
	include("../inc/left_menu.php");
	?>
	</td>
	<td valign="top">
	<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
		<?php
		$col_1_a="#DEA998";
		$col_2_a="#C5D8E8";
		include ("popup_top.inc"); 
		?>
		</td>
	</tr>
	<tr>
		<td>
		
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td>
		<?php
		$post_admin_row_id=$_GET['id'];
		$chk_exist="select * from popup where id='$post_admin_row_id'";
		$chk_exist_result=mysqli_query($con, $chk_exist);
		if (mysqli_num_rows($chk_exist_result)==0 || $post_admin_row_id=="") {
			print "<script language=\"JavaScript\">
			alert (\"Some Fields Are Missing.\");
			history.back();
			</script>";
		} else {
			$each_row=mysqli_fetch_array($chk_exist_result);
			$dataID=$each_row['id'];
			$dataImage=$each_row['img_name'];
			$dataActive=$each_row['active'];
		}
		?>
		<h3>Modify Popup Banner</h3>
		<h4>Please fill all fields.</h4>
		
		<form name="edit_popup" method="post"  action="do_edit_popup.php">
		<table class="adminBox">
		<tr>
			<th>IMAGE:*</th>
			<td><IMG SRC="<?php print $common_path.'/uploads/popup/'.$dataImage;?>" width="200" BORDER="0" ALT=""><input type="hidden" name="id" value="<?php print "$dataID"; ?>"></td>
		</tr>
		<tr>
			<th>ACTIVE:*</th>
			<td><select name="active">
					<option value="<?php echo $dataActive;?>">Select One</option>
					<option value="Yes">Yes</option>
					<option value="No">No</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<th></th>
			<td><input type="submit" name="submit" value="SUBMIT">&nbsp;<input type="reset" name="reset" value="RESET"></td>
		</tr>
		</table>
		</form>
		</td>
			</tr>
		</table>
		</td>
	</td>
</tr>
</table>

<?php
include("../inc/footer.php");
?>
</center>
</body>
</html>