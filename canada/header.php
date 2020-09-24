<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
  FB.init({
    xfbml            : true,
    version          : 'v3.3'
  });
};

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=install_email
  page_id="1468086306574767"
    logged_in_greeting="Hi! Welcome to CAN 4 Canada. How can we help you?"
    logged_out_greeting="Hi! Welcome to CAN 4 Canada. How can we help you?">
</div>



<section id="header-top" class="clearfix">
	<div class="container">
		<div id="header-slogan">
			<p><?php
				$getDataQuery=mysqli_query($con, "select * from contactus");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Data doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataSlogan=$eachData['slogan'];
					print $dataSlogan;
				}
			?></p>
		</div>

		<div id="header-social">
			<a href="https://www.facebook.com/canconsultancee/" class="facebook" title="FACEBOOK" target="_blank"><span class="fbdisplace">Facebook</span></a>
			<a href="http://www.twitter.com" class="twitter" title="TWITTER" target="_blank"><span class="twdisplace">Twitter</span></a>
			<a href="mailto:info@canconsultancy.com" class="email" title="EMAIL"><span class="mldisplace">Email</span></a>
		</div>
		
	</div>
</section>

<header>
	<div class="container clearfix">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

					<span class="sr-only">Toggle navigation</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

				</button>

				<a class="navbar-brand" href="<?php echo $common_path;?>"><img src="images/logo.png" border="0" alt=""></a>

			</div>



			<!--/.navbar-header-->

			<?php

			$selectedMenu_a="style=\"background:#ba3029; color:#fff;\"";



			switch ($selectedMenu) {
				case home:
					$homeSelected_a=$selectedMenu_a;
					break;

				case aboutus:
					$aboutusSelected_a=$selectedMenu_a;
					break;

				case services:
					$servicesSelected_a=$selectedMenu_a;
					break;

				case canada:
					$canadaSelected_a=$selectedMenu_a;
					break;

				case classes:
					$classesSelected_a=$selectedMenu_a;
					break;

				case gallery:
					$gallerySelected_a=$selectedMenu_a;
					break;

				case blog:
					$blogSelected_a=$selectedMenu_a;
					break;

				case contactus:
					$contactusSelected_a=$selectedMenu_a;
					break;

			}

			?>



			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="<?php echo $common_path;?>" <?php print $homeSelected_a; ?>>Home</a>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $aboutusSelected_a; ?>>About <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $common_path;?>/introduction.php">Introduction</a></li>
							<?php
								$listing=mysqli_query($con, "select * from about_us order by position asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/aboutus.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
							<?php
								$listing=mysqli_query($con, "select * from messages order by position asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataDesignation=$each_row['designation'];
									print "<li><a href='$common_path/messages.php?id=$dataID'>Message from $dataDesignation</a></li>";				
								}
							?>
							<li><a href="<?php echo $common_path;?>/our-team.php">Our Team</a></li>
							<li><a href="<?php echo $common_path;?>/testimonials.php">Testimonials</a></li>
							<li><a href="<?php echo $common_path;?>/clients.php">Colleges/Universities</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $servicesSelected_a; ?>>Services <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$result=mysqli_query($con, "select * from services order by position asc");
								while ($each_row=mysqli_fetch_array($result)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/services.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $classesSelected_a; ?>>Classes <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$result=mysqli_query($con, "select * from language_class order by position asc");
								while ($each_row=mysqli_fetch_array($result)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/language-class.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $canadaSelected_a; ?>>About Canada <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$result=mysqli_query($con, "select * from country order by position asc");
								while ($each_row=mysqli_fetch_array($result)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/about-canada.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="<?php echo $common_path;?>/blog.php" <?php print $blogSelected_a; ?>>Blog</a>
					</li>
					<li class="dropdown">
						<a href="<?php echo $common_path;?>/gallery.php" <?php print $gallerySelected_a; ?>>Gallery</a>
					</li>
					<li class="dropdown">
						<a href="<?php echo $common_path;?>/contactus.php" <?php print $contactusSelected_a; ?>>Contact</a>
					</li>
				</ul>
			</div>
			<!--/.navbar-collapse-->

		</nav>

	</div>

</header>