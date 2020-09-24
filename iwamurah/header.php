<div id="header-wrap">
	<div id="header">
		<div class="logo">
			<a href="<?php echo $common_path;?>"><img src="images/logo2.png" width="473" height="74" border="0" alt=""></a>
		</div>
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
		<div class="emergency">
			<h4>24 hrs EMERGENCY</h4>
			<h3>01 6612695, 6612705</h3>
		</div>
		<div class="clear"></div>
	</div>

	<div id="nav">
		<?php
		$selectedMenu_a="style=\"background:#dd1f26; color:#fff;\"";

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

			case doctors:
				$doctorsSelected_a=$selectedMenu_a;
				break;

			case packages:
				$packagesSelected_a=$selectedMenu_a;
				break;

			case healthCamps:
				$healthCampsSelected_a=$selectedMenu_a;
				break;

			case gallery:
				$gallerySelected_a=$selectedMenu_a;
				break;

			case news:
				$newsSelected_a=$selectedMenu_a;
				break;

			case careers:
				$careersSelected_a=$selectedMenu_a;
				break;

			case sponsor:
				$sponsorSelected_a=$selectedMenu_a;
				break;

			case contactus:
				$contactusSelected_a=$selectedMenu_a;
				break;
		}
		?>
		<a class="toggleMenu" href="#">Menu</a>
		<ul class="nav">
			<li>
				<a href="<?php echo $common_path;?>" <?php print $homeSelected_a; ?>>Home</a>
			</li>
			<li class="test">
				<a href="#" <?php print $aboutusSelected_a; ?>>About Us</a>
				<ul>
					<?php
						$result=mysqli_query($con, "select * from aboutus order by position asc");
						while ($each_row=mysqli_fetch_array($result)){
							$dataID=$each_row['id'];
							$dataTitle=$each_row['title'];
							print "<li><a href=\"$common_path/aboutus.php?id=$dataID\">$dataTitle</a></li>";				
						}
					?>
					<li><a href="<?php echo $common_path;?>/bod.php">Board of Directors</a></li>
					<li><a href="<?php echo $common_path;?>/management-team.php">Management Team</a></li>
				</ul>
			</li>

			<li>
				<a href="#" <?php print $servicesSelected_a; ?>>Services</a>
				<ul>
					<?php
						$result=mysqli_query($con, "select * from services order by position asc");
						while ($each_row=mysqli_fetch_array($result)){
							$dataID=$each_row['id'];
							$dataTitle=$each_row['title'];
							print "<li><a href=\"$common_path/services.php?id=$dataID\">$dataTitle</a></li>";				
						}
					?>
				</ul>
			</li>
			
			<li>
				<a href="#" <?php print $doctorsSelected_a; ?>>Doctors</a>
				<ul>
					<?php
						$result=mysqli_query($con, "select distinct department from doctors order by department asc");
						while ($each=mysqli_fetch_array($result)){
							$dataID=$each['id'];
							$dataDepartment=$each['department'];
							print "<li><a href='$common_path/doctors.php?department=$dataDepartment'>$dataDepartment</a></li>";				
						}
					?>
				</ul>
			</li>

			<li><a href="#" <?php print $packagesSelected_a; ?>>Packages</a>
				<ul>
					<?php
						$result=mysqli_query($con, "select * from health_packages order by position asc");
						while ($each_row=mysqli_fetch_array($result)){
							$dataID=$each_row['id'];
							$dataTitle=$each_row['title'];
							print "<li><a href=\"$common_path/health-packages.php?id=$dataID\">$dataTitle</a></li>";				
						}
					?>
				</ul>
			</li>
			
			<!--<li><a href="#" <?php print $healthCampsSelected_a; ?>>Health Camps</a>
				<ul>
					<?php
						$result=mysqli_query($con, "select * from health_camps order by position asc");
						while ($each_row=mysqli_fetch_array($result)){
							$dataID=$each_row['id'];
							$dataTitle=$each_row['title'];
							print "<li><a href=\"$common_path/health-camps.php?id=$dataID\">$dataTitle</a></li>";				
						}
					?>
				</ul>
			</li>-->
			
			<li>
				<a href="#" <?php print $newsSelected_a; ?>>News</a>
					<ul>
						<li><a href="<?php print"$common_path/news.php"; ?>">News & Notices</a></li>
						<li><a href="<?php echo $common_path;?>/gallery.php">Photo Gallery</a></li>
					</ul>
			</li>

			<li>
						<a href="#" <?php print $sponsorSelected_a; ?>>Sponsor</a>
						<ul>
							<?php
								$listing=mysqli_query($con, "select * from sponsor order by position asc");
								while ($each_row=mysqli_fetch_array($listing)){
									$dataID=$each_row['id'];
									$dataTitle=$each_row['title'];
									print "<li><a href='$common_path/sponsor.php?id=$dataID'>$dataTitle</a></li>";				
								}
							?>
						</ul>
					</li>

			<li><a href="<?php echo $common_path;?>/contactus.php" <?php print $contactusSelected_a; ?>>Contact Us</a></li>
		</ul>
	</div>
</div>