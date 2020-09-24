<div class="header-top-wrap">
	<div class="header-top">
		<div id="language">
			<div id="google_translate_element"></div>
			<script>
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({
				pageLanguage: 'en',
				includedLanguages: 'ja,ko,ne',
				autoDisplay: false,
				layout: google.translate.TranslateElement.InlineLayout.SIMPLE
			  }, 'google_translate_element');
			}
			</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		</div>
		<div class="header-top-address">
			<p>Dr. Iwamura Memorial Hospital & Research Center - Affiliated to CTEVT</p>
		</div>
		
		<div class="header-top-nav">
			<ul>
				<li><a href="http://mail.iwamuracollege.edu.np" target="_blank">Check Mail</a></li>
				<li><a href="<?php echo $common_path;?>/careers.php">Careers</a></li>
				<li><a href="<?php echo $common_path;?>/contactus.php">Contact Us</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="header-wrap">
	<div class="header">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo $common_path;?>"><img src="images/logo1.png" width="363" height="60" border="0" alt=""></a>
			</div>
			<!--/.navbar-header-->
			<?php
			$selectedMenu_a="style=\"background:#0066cc; color:#fff;\"";

			switch ($selectedMenu) {
				case home:
					$homeSelected_a=$selectedMenu_a;
					break;
					
				case aboutus:
					$aboutusSelected_a=$selectedMenu_a;
					break;

				case stations:
					$stationsSelected_a=$selectedMenu_a;
					break;

				case programs:
					$programsSelected_a=$selectedMenu_a;
					break;

				case downloads:
					$downloadsSelected_a=$selectedMenu_a;
					break;

				case admissions:
					$admissionsSelected_a=$selectedMenu_a;
					break;

				case gallery:
					$gallerySelected_a=$selectedMenu_a;
					break;

				case news:
					$newsSelected_a=$selectedMenu_a;
					break;

				case contactus:
					$contactusSelected_a=$selectedMenu_a;
					break;
			}
			?>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="<?php echo $common_path;?>" class="dropdown-toggle" <?php print $homeSelected_a; ?>>Home</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $aboutusSelected_a; ?>>About Us <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$result=mysqli_query($con, "select * from aboutus order by position asc");
								while ($each_row=mysqli_fetch_array($result)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href=\"$common_path/aboutus.php?id=$dataID\">$dataTitle</a></li>";				
								}
							?>
							<?php
								$result=mysqli_query($con, "select * from message order by position asc limit 5");
								while ($each_row=mysqli_fetch_array($result)){
									$dataID=$each_row['id'];
									$dataDesignation=html_entity_decode($each_row['designation']);
									print "<li><a href=\"$common_path/message.php?id=$dataID\">Message from $dataDesignation</a></li>";				
								}
							?>
							<li><a href="<?php echo $common_path;?>/bod.php">Board of Directors</a></li>
							<li><a href="<?php echo $common_path;?>/management-team.php">Management Team</a></li>
							<li><a href="<?php echo $common_path;?>/testimonial.php">Testimonials</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $programsSelected_a; ?>>Academic Programs <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$result=mysqli_query($con, "select * from academics order by position asc");
								while ($each_row=mysqli_fetch_array($result)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href=\"$common_path/academic-programs.php?id=$dataID\">$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $admissionsSelected_a; ?>>Admissions <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php
								$result=mysqli_query($con, "select * from admissions order by position asc");
								while ($each_row=mysqli_fetch_array($result)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href=\"$common_path/admissions.php?id=$dataID\">$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" <?php print $newsSelected_a; ?>>Newsroom <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo $common_path;?>/news.php">News & Updates</a></li>
							<li><a href="<?php echo $common_path;?>/notice.php">Notice Board</a></li>
							<li><a href="<?php echo $common_path;?>/gallery.php">Photo Gallery</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="http://www.iwamurahospital.com" target="_blank">Hospital</a>
					</li>
				</ul>
			</div>
			<!--/.navbar-collapse-->
		</nav>
	</div>
</div>