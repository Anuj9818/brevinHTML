
<div class="down-link-wrap">
	<div class="container">
		<div class="down-link">
			<h1>Quick Contact</h1>
			<?php
					$result=mysqli_query($con, "select * from contactus");
					while ($each_row=mysqli_fetch_array($result)){
						$dataID=$each_row['id'];
						$dataAddress=$each_row['address'];
						$dataPhone=$each_row['phone'];
						$dataEmail=$each_row['email'];
						print "<p>$dataAddress</p><p>Tel: $dataPhone</p><p>Email: $dataEmail</p>";				
					}
				?>
		</div>

		<div class="down-link">
			<h1>Quick Links</h1>
			<ul>
				<?php
					$result=mysqli_query($con, "select * from aboutus order by position asc");
					while ($each_row=mysqli_fetch_array($result)){
						$dataID=$each_row['id'];
						$dataTitle=$each_row['title'];
						print "<li><a href=\"$common_path/aboutus.php?id=$dataID\">$dataTitle</a></li>";				
					}
				?>
				
				<li><a href="<?php echo $common_path;?>/services.php">Services</a></li>
				<li><a href="<?php echo $common_path;?>/departments.php">Our Doctors</a></li>
				<li><a href="<?php echo $common_path;?>/careers.php">Careers</a></li>
			</ul>
		</div>

		<div class="down-social">
			<h1>Social Network</h1>
			<ul>
				<li><a href="https://www.facebook.com/imharcbhaktapur" class="facebook" title="facebook" target="_blank"><span class="fbdisplace">Facebook</span></a></li>
				<li><a href="https://www.youtube.com/channel/UCDin1lPtC2kOLnASMIuO9Ng" class="youtube" title="Youtube" target="_blank"><span class="ytdisplace">Youtube</span></a></li>
			</ul><br><br><br class="clear">
			<ul>
				<li>
					<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					<div class="fb-like" data-href="https://www.facebook.com/imharcbhaktapur" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
				</li>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>

<div id="affiliations">
	<a href="http://www.iwamuracollege.edu.np" target="_blank"><img src="images/concern_1.jpg" width="408" height="67" border="0" alt=""></a>
	<a href="http://www.njhcfoundation.org" target="_blank" ><img src="images/concern_2.jpg" width="223" height="67" border="0" alt=""></a>
	<div class="clear"></div>
</div>

<div id="footer">
	<div class="copyright"><b>Iwamura Memorial Hospital and Research Center</b> &copy; <?php echo date('Y');?>. all rights reserved.</div>
	<div class="powered">Website by <a href="http://www.brevincreation.com" target="_blank">Brevin Creation</a></div>
	<div class="clear"></div>
</div>

<script type="text/javascript" src="<?php echo $common_path;?>/assets/nav/script.js"></script>

<script src="<?php echo $common_path;?>/assets/phoenix/jquery.mobile.touchsupport.js"></script>
<script src="<?php echo $common_path;?>/assets/phoenix/jquery.phoenix.js"></script>
<script src="<?php echo $common_path;?>/assets/phoenix/main.js"></script>
	
</body>
</html>
