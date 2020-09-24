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
		<li><a <?php if($navigationSelected=="bigSlideShowManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/highlight-big/index.php"; ?>">Big Slideshow</a></li>

    	<li><a <?php if($navigationSelected=="sportsClimbingManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/sports_climbing/index.php"; ?>">Sports Climbing</a></li>

    	<li><a <?php if($navigationSelected=="alpineTrainingManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/alpine_training/index.php"; ?>">Alpine Training</a></li>

		<li><a <?php if($navigationSelected=="activitiesManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/activities/index.php"; ?>">Activities</a></li>

		<li><a <?php if($navigationSelected=="giveBackManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/give_back/index.php"; ?>">Give Back</a></li>

		<li><a <?php if($navigationSelected=="latestNewsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/latest_news/index.php"; ?>">Latest News</a></li>

		<li><a <?php if($navigationSelected=="pressReleaseManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/press_release/index.php"; ?>">Press Release</a></li>

		<li><a <?php if($navigationSelected=="galleryManagement") { print "class=\"active\""; } ?> href="<?php print "$admin_path/gallery/index.php?action=album&sub=manage"; ?>">Gallery</a></li>

		<li><a <?php if($navigationSelected=="videoManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/video/index.php"; ?>">Video Gallery</a></li>

		<li><a <?php if($navigationSelected=="downloadManagement") { print "class=\"active\""; } ?> href="<?php print "$admin_path/downloads/index.php?action=manage"; ?>">Downloads</a></li>

		<li><a <?php if($navigationSelected=="aboutusManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/aboutus/index.php"; ?>">About Us</a></li>

		<li><a <?php if($navigationSelected=="contactusManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/contactus/index.php"; ?>">Contact Us</a></li>

		<li><a <?php if($navigationSelected=="affiliationsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/affiliations/index.php"; ?>">Authorized</a></li>

		<li><a <?php if($navigationSelected=="resourcesManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/resources/index.php"; ?>">Resources</a></li>

		<li><a <?php if($navigationSelected=="testimonialsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/testimonials/index.php"; ?>">Testimonials</a></li>

		<li><a <?php if($navigationSelected=="faqsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/faqs/index.php"; ?>">FAQs</a></li>

		<li><a <?php if($navigationSelected=="termsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/terms/index.php"; ?>">Terms & Conditions</a></li>

		<li><a <?php if($navigationSelected=="usefullLinksManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/usefull_links/index.php"; ?>">Useful Link</a></li>
	</ul>
</div>
