<section id="footer-content">
	<div class="container clearfix">
		<div class="footer">
			<img src="images/footer-logo.png" width="213" height="56" border="0" alt=""><br><br>
			<?php
				$getDataQuery=mysqli_query($con, "select * from contactus");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Data doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataAddress=$eachData['address'];
					$dataPhone=$eachData['phone'];
					$dataEmail=$eachData['email'];

					print "<p>$dataAddress<br>
				$dataPhone<br>
				<a href='mailto:$dataEmail'>$dataEmail</a></p>";
				}
			?>
			<div id="footer-social" class="clearfix">
				<a href="http://www.facebook.com/hcmsnepal" class="facebook" title="FACEBOOK" target="_blank"><span class="fbdisplace">Facebook</span></a>
				<a href="http://www.twitter.com/hcmsnepal" class="twitter" title="TWITTER" target="_blank"><span class="twdisplace">Twitter</span></a>
				<a href="http://www.youtube.com" class="youtube" title="YOUTUBE" target="_blank"><span class="ytdisplace">Youtube</span></a>
				<a href="mailto:info@hcmsnepal.com" class="email" title="EMAIL"><span class="mldisplace">Email</span></a>

			</div>
		</div>
		<div class="footer">
			<h1>Quick Link</h1>
			<ul>
				<li><a href="<?php echo $common_path;?>/gallery.php">Photo Gallery</a></li>
				<li><a href="<?php echo $common_path;?>/video.php">Video Gallery</a></li>
				<li><a href="<?php echo $common_path;?>/terms-conditions.php">Terms & Conditions</a></li>
				<li><a href="<?php echo $common_path;?>/faqs.php">FAQs</a></li>
			</ul>
		</div>
		<div class="footer">
			<h1>Download</h1>
			<ul>
				<?php
					$getLatestDownloads=mysqli_query($con, "select * from downloads order by id desc limit 4");
					if (mysqli_num_rows($getLatestDownloads)==0) {
						print "<li>File Not Available.</li>";
					} else {
						while ($eachLatestDownloads=mysqli_fetch_array($getLatestDownloads)) {
							$latestDownloadTitle=html_entity_decode($eachLatestDownloads['title']);
							$latestDownloadFileName=$eachLatestDownloads['filename'];
							print "<li><a href='$common_path/uploads/downloads/$latestDownloadFileName' target='_blank'>$latestDownloadTitle</a></li>";
						}
					}
				?>
				<li><a href="<?php echo $common_path;?>/downloads.php">view all</a>
			</ul>
		</div>
		<div class="footer">
			<h1>Useful Link</h1>
			<ul>
				<?php
					$result=mysqli_query($con, "select * from usefull_links order by position asc limit 4");								
					while ($eachData=mysqli_fetch_array($result)){
						$dataTitle=$eachData['title'];
						$dataWebsite=$eachData['website'];

						print "<li><a href='$dataWebsite' target='_blank'>$dataTitle</a></li>";
					}
				?>
					<li><a href="<?php echo $common_path;?>/useful-links.php">view all</a></li>
			</ul>
		</div>
	</div>
</section>

<section id="copyright-content">
	<div class="container clearfix">
		<div class="copyright">Himalayan Climbing & Mountaineering School &copy; <?php echo date('Y'); ?>. All rights reserved.</div>
		<div class="designed">Made by <a href="http://www.brevincreation.com" target="_blank">BREVIN CREATION</a></div>
	</div>
</section>
	

<script src="<?php echo $common_path;?>/assets/phoenix/jquery.mobile.touchsupport.js"></script>
<script src="<?php echo $common_path;?>/assets/phoenix/jquery.phoenix.js"></script>
<script src="<?php echo $common_path;?>/assets/phoenix/main.js"></script>

</body>
</html>

