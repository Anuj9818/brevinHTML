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
		<li><a <?php if($navigationSelected=="newsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/news/index.php"; ?>">News & Notices</a></li>

		<li><a <?php if($navigationSelected=="bigSlideShowManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/highlight-big/index.php"; ?>">Big Slideshow</a></li>

		<li><a <?php if($navigationSelected=="homeArticlesManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/home_articles/index.php"; ?>">Highlight Articles</a></li>

		<li><a <?php if($navigationSelected=="aboutusManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/aboutus/index.php"; ?>">About us</a></li>

		<li><a <?php if($navigationSelected=="bodManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/bod/index.php"; ?>">Board of Directors</a></li>

		<li><a <?php if($navigationSelected=="mprofileManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/mprofile/index.php"; ?>">Management Team</a></li>

		<li><a <?php if($navigationSelected=="servicesManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/services/index.php"; ?>">Services</a></li>

		<li><a <?php if($navigationSelected=="doctorsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/doctors/index.php"; ?>">Doctors</a></li>

		<!--<li><a <?php if($navigationSelected=="healthCampsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/health-camp/index.php"; ?>">Health Camp</a></li>-->

		<li><a <?php if($navigationSelected=="healthPackagesManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/health_packages/index.php"; ?>">Health Packages</a></li>

		<li><a <?php if($navigationSelected=="galleryManagement") { print "class=\"active\""; } ?> href="<?php print "$admin_path/gallery/index.php?action=album&sub=manage"; ?>">Gallery</a></li>

		<li><a <?php if($navigationSelected=="affiliationsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/affiliations/index.php"; ?>">Associated with</a></li>

		<li><a <?php if($navigationSelected=="careersManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/careers/index.php"; ?>">Careers</a></li>

		<li><a <?php if($navigationSelected=="sponsorManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/sponsor/index.php"; ?>">Sponsor</a></li>

		<li><a <?php if($navigationSelected=="contactusManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/contactus/index.php"; ?>">Contact Us</a></li>

		<li><a <?php if($navigationSelected=="popupManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/popup/index.php"; ?>">Popup Banner</a></li>

</div>