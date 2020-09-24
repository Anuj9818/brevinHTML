<?php
if ($stm_logged_state==0) {
	print "<script language=\"JavaScript\">
		window.location=\"../index.php?error=1\";
	</script>";
	exit();
}
?>

<div id="menu">
	<ul>
		<li><a <?php if($navigationSelected=="newsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/news/index.php"; ?>">News & Updates</a></li>

		<li><a <?php if($navigationSelected=="noticeManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/notice/index.php"; ?>">Notices</a></li>

		<li><a <?php if($navigationSelected=="bigSlideShowManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/highlight-big/index.php"; ?>">Big Slideshow</a></li>

		<li><a <?php if($navigationSelected=="aboutusManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/aboutus/index.php"; ?>">About us</a></li>

		<li><a <?php if($navigationSelected=="bodManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/bod/index.php"; ?>">Board of Directors</a></li>

		<li><a <?php if($navigationSelected=="mprofileManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/mprofile/index.php"; ?>">Management Team</a></li>

		<li><a <?php if($navigationSelected=="messageManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/message/index.php"; ?>">Messages</a></li>

		<li><a <?php if($navigationSelected=="testimonialManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/testimonial/index.php"; ?>">Testimonials</a></li>

		<li><a <?php if($navigationSelected=="academicsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/academics/index.php"; ?>">Academic Programs</a></li>

		<li><a <?php if($navigationSelected=="admissionsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/admissions/index.php"; ?>">Admissions</a></li>

		<li><a <?php if($navigationSelected=="galleryManagement") { print "class=\"active\""; } ?> href="<?php print "$admin_path/gallery/index.php?action=album&sub=manage"; ?>">Gallery</a></li>

		<li><a <?php if($navigationSelected=="downloadManagement") { print "class=\"active\""; } ?> href="<?php print "$admin_path/downloads/index.php?action=manage"; ?>">Downloads</a></li>

		<li><a <?php if($navigationSelected=="contactusManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/contactus/index.php"; ?>">Contact Us</a></li>

		<li><a <?php if($navigationSelected=="careersManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/careers/index.php"; ?>">Careers</a></li>

		<li><a <?php if($navigationSelected=="popupManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/popup/index.php"; ?>">Popup Banner</a></li>

</div>