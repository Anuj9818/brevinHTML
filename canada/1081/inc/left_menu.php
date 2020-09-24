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

		<li><a <?php if($navigationSelected=="blogManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/blog/index.php"; ?>">Blog</a></li>

		<li><a <?php if($navigationSelected=="introductionManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/introduction/index.php"; ?>">Introduction</a></li>
		
		<li><a <?php if($navigationSelected=="aboutusManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/aboutus/index.php"; ?>">About Us</a></li>

		<li><a <?php if($navigationSelected=="ourTeamManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/our_team/index.php"; ?>">Our Team</a></li>

		<li><a <?php if($navigationSelected=="messagesManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/messages/index.php"; ?>">Messages</a></li>

		<li><a <?php if($navigationSelected=="testimonialsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/testimonials/index.php"; ?>">Testimonials</a></li>

		<li><a <?php if($navigationSelected=="clientsManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/clients/index.php"; ?>">Colleges/Universities</a></li>

		<li><a <?php if($navigationSelected=="servicesManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/services/index.php"; ?>">Our Services</a></li>

		<li><a <?php if($navigationSelected=="languageClassManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/language_class/index.php"; ?>">Test Preparation</a></li>

		<li><a <?php if($navigationSelected=="countryManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/country/index.php"; ?>">About Canada</a></li>

		<li><a <?php if($navigationSelected=="galleryManagement") { print "class=\"active\""; } ?> href="<?php print "$admin_path/gallery/index.php?action=album&sub=manage"; ?>">Gallery</a></li>

		<li><a <?php if($navigationSelected=="contactusManagement") { print "class=\"active\""; } ?> href="<?php print"$admin_path/contactus/index.php"; ?>">Contact Us</a></li>

	</ul>

</div>