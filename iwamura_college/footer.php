<div class="down-link-wrap">
	<div class="down-link">
		<h2>Academics</h2>
		<ul>
			<?php
				$result=mysqli_query($con, "select * from academics order by position asc");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=$each_row['title'];
					print "<li><a href=\"$common_path/academics.php?id=$dataID\">$dataTitle</a></li>";				
				}
			?>
		</ul>
	</div>
	<div class="down-link">
		<h2>Quick Links</h2>
		<ul>
			<?php
				$result=mysqli_query($con, "select * from aboutus order by position asc limit 2");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=$each_row['title'];
					print "<li><a href=\"$common_path/aboutus.php?id=$dataID\">$dataTitle</a></li>";				
				}
			?>
			<?php
				$result=mysqli_query($con, "select * from message order by position asc limit 2");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataDesignation=html_entity_decode($each_row['designation']);
					print "<li><a href=\"$common_path/message.php?id=$dataID\">Message from $dataDesignation</a></li>";				
				}
			?>
		</ul>
	</div>
	<div class="down-link">
		<h2>Downloads</h2>
		<ul>
			<?php
				$getLatestDownloads=mysqli_query($con, "select * from downloads order by id desc limit 4");
				if (mysqli_num_rows($getLatestDownloads)==0) {
					print "<li>No Downloadable Files Available.</li>";
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
	<div class="down-social">
		<h2>Social Network</h2>
		<ul>
			<li><a href="https://www.facebook.com" class="facebook" title="facebook" target="_blank"><span class="fbdisplace">Facebook</span></a></li>
			<li><a href="https://www.youtube.com" class="youtube" title="Youtube" target="_blank"><span class="ytdisplace">Youtube</span></a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="footer-wrap">
	<div class="footer">
		<div class="copyright">
			Copyright &copy; 2011-<?php echo date('Y');?>. <span>Iwamura College of Health Science</span>
		</div>
		<div class="powered">
			Website by <a href="http://www.brevincreation.com" target="_blank">Brevin Creation</a>
		</div>
		<div class="clear"></div>
	</div>
</div>

</body>
</html>