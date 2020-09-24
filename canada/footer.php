<section id="footer-content">
	<div class="container clearfix">
		<div class="footer">
			<h1>Quick Contact</h1>
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
				Tel: $dataPhone<br>
				Email: <a href='mailto:$dataEmail'>$dataEmail</a></p>";
				}
			?>

		</div>
		
		<div class="footer post">
			<h1>About Canada</h1>
			<ul>
				<?php
					$result=mysqli_query($con, "select * from country order by position asc");
					while ($each_row=mysqli_fetch_array($result)){
						$dataID=$each_row['id'];
						$dataTitle=$each_row['title'];
						print "<li><a href='$common_path/about-canada.php?id=$dataID'>$dataTitle</a></li>";				
					}
				?>
			</ul>
		</div>
		
		<div class="footer">
			<h1>Follow Us</h1>
			<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-like" data-href="https://www.facebook.com/canconsultancee" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
	</div>
</section>

<section id="copyright-content">
	<div class="container clearfix">
		<div class="copyright">CAN Consulting Services Pvt. Ltd. &copy; <?php echo date('Y'); ?> . All rights reserved.</div>
		<div class="madeby">Website by <a href="http://www.brevincreation.com" target="_blank">Brevin Creation</a></div>
	</div>
</section>

<script src="<?php echo $common_path;?>/assets/clean-tab/mtabs.js"></script> 
<script>
	$(function() {
		$(".set-1").mtabs();
	});
</script>

</body>

</html>