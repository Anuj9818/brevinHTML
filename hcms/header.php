<section id="header-top-wrap">
	<div id="header-top">
		<div class="container clearfix">
			<div id="header-top-forms">
					<a href='<?php echo $common_path; ?>'>Home</a>
				</div>
			<div id="header-contact">
				<?php
					$getDataQuery=mysqli_query($con, "select * from contactus");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! Data doesn't exist.";
					} else {
						$eachData=mysqli_fetch_array($getDataQuery);
						$dataPhone=$eachData['phone'];
						$dataEmail=$eachData['email'];

						print "<div id='header-contact-email'>
									<p><a href='mailto:$dataEmail'>$dataEmail</a></p>
								</div>
								<div id='header-contact-phone'>
									<p>$dataPhone</p>
								</div>";
					}
				?>
			</div>

			<div id="header-top-terms-forms" class="clearfix">
				<div id="header-top-terms">
					<p><a href="<?php echo site_url();.'/terms'; ?>">Terms & Conditions</a></p>
				</div>
				<!--<div id="header-top-forms">
					<?php
						$getLatestDownloads=mysqli_query($con, "select * from downloads order by id desc limit 1");
						if (mysqli_num_rows($getLatestDownloads)==0) {
							print "<li>File Not Available.</li>";
						} else {
							while ($eachLatestDownloads=mysqli_fetch_array($getLatestDownloads)) {
								$latestDownloadTitle=html_entity_decode($eachLatestDownloads['title']);
								$latestDownloadFileName=$eachLatestDownloads['filename'];
								print "<p><a href='$common_path/uploads/downloads/$latestDownloadFileName' target='_blank'>$latestDownloadTitle</a></p>";
							}
						}
					?>
					
				</div>-->
				<div id="header-top-contact">
					<p><a href="<?php echo site_url().'/contact.php'; ?>">Contact</a></p>
				</div>
			</div>

			<div id="header-social">
				<a href="http://www.facebook.com/hcmsnepal" class="facebook" title="FACEBOOK" target="_blank"><span class="fbdisplace">Facebook</span></a>
				<a href="http://www.twitter.com/hcmsnepal" class="twitter" title="TWITTER" target="_blank"><span class="twdisplace">Twitter</span></a>
				<a href="http://www.youtube.com" class="youtube" title="YOUTUBE" target="_blank"><span class="ytdisplace">Youtube</span></a>
				<!-- <a href="#inline" class="email modalbox" title="EMAIL" target="_blank"><span class="mldisplace">Email Us</span></a> -->
				
						  <!-- hidden inline form -->
						<!-- <div id="inline">
							<h2>Send us a Message</h2>

							<form id="contact" name="contact" action="#" method="post">
								<label for="email">Full Name</label>
								<input type="email" id="name" name="name" class="txt">
								<br>
								<label for="email">Country</label>
								<input type="email" id="country" name="country" class="txt">
								<br>
								<label for="email">Phone</label>
								<input type="email" id="phone" name="phone" class="txt">
								<br>
								<label for="email">E-mail</label>
								<input type="email" id="email" name="email" class="txt">
								<br>
								<label for="msg">Comments</label>
								<textarea id="msg" name="msg" class="txtarea"></textarea>

								<img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" style="float:left;"/>
								<div style="float:left;"><input type="text" name="captcha_code" size="5" maxlength="6" /> <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a></div><br><br><div class="clear"></div>

								<button id="send">Send E-mail</button>
							</form>
						</div> -->
			</div>
		</div>
	</div>
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
				<a class="navbar-brand" href="<?php echo $common_path;?>"><img src="images/logo1.png" border="0" alt="Himalayan Climbing & Mountaineering School" title="Himalayan Climbing & Mountaineering School"></a>
			</div>
			<!--/.navbar-header-->
			<?php
			$selectedMenu_a="style=\"background:#1796f8; color:#fff;\"";

			switch ($selectedMenu) {
				case home:
					$homeSelected_a=$selectedMenu_a;
					break;
					
				case about:
					$aboutSelected_a=$selectedMenu_a;
					break;

				case courses:
					$coursesSelected_a=$selectedMenu_a;
					break;

				case competitions:
					$competitionsSelected_a=$selectedMenu_a;
					break;

				case activities:
					$activitiesSelected_a=$selectedMenu_a;
					break;

				case giveback:
					$givebackSelected_a=$selectedMenu_a;
					break;

				case resources:
					$resourcesSelected_a=$selectedMenu_a;
					break;

				case news:
					$newsSelected_a=$selectedMenu_a;
					break;

				case contact:
					$contactSelected_a=$selectedMenu_a;
					break;
			}
			?>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $coursesSelected_a; ?>>Sport Climbing<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$listing=mysqli_query($con, "select * from sports_climbing order by position asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/sports-climbing.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $competitionsSelected_a; ?>>Alpine Training<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$listing=mysqli_query($con, "select * from alpine_training order by position asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/alpine-training.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $activitiesSelected_a; ?>>Activities<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$listing=mysqli_query($con, "select * from activities order by position asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/activities.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $givebackSelected_a; ?>>Give Back<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$listing=mysqli_query($con, "select * from give_back order by id asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/give-back.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $newsSelected_a; ?>>News<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $common_path;?>/latest-news.php">Latest News</a></li>
							<li><a href="<?php echo $common_path;?>/press-release.php">Press Release</a></li>
							<li><a href="<?php echo $common_path;?>/gallery.php">Photo Gallery</a></li>
							<li><a href="<?php echo $common_path;?>/video.php">Video Gallery</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $resourcesSelected_a; ?>>Resources<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$listing=mysqli_query($con, "select * from resources order by id asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/resources.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $aboutSelected_a; ?>>About<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$listing=mysqli_query($con, "select * from aboutus order by position asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/aboutus.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
							<li><a href="<?php echo $common_path;?>/testimonials.php">Testimonials</a></li>
							<li><a href="<?php echo $common_path;?>/contact.php" <?php print $contactSelected_a; ?>>Contact Us</a></li>
						</ul>
					</li>
					
				</ul>
			</div>
			<!--/.navbar-collapse-->
		</nav>
	</div>
	</header>

</section>



