<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>

<?php include 'header.php';?>

<div class="phoenix-slider">
	<?php
		$loopi=0;
		$result=mysqli_query($con, "select * from big_slider order by position asc");
		while ($each_row=mysqli_fetch_array($result)){
			$loopi++;
			$dataID=$each_row['id'];
			$dataTitle=html_entity_decode($each_row['title']);
			$dataTitle2=html_entity_decode($each_row['title2']);
			$dataLink=html_entity_decode($each_row['link']);
			$dataImage=$each_row['image'];

			print "<div class='phoenix-feather'>
					<div class='phoenix-slider-text'><h1>$dataTitle</h1><p>$dataTitle2</p><a href='$dataLink' class='while'>More Details</a></div>
					<img u='image' src='$common_path/uploads/big_slider/$dataImage' alt=''/>
				</div>
				<!-- END ash -->";				
		}
	?>
</div>
<!-- END phoenix-slider -->

<section id="intro-content">
	<div class="container clearfix">
		<div id="intro">
			<?php
			  $getDataQuery=mysqli_query($con, "select * from aboutus order by RAND() limit 1");               
			  if(mysqli_num_rows($getDataQuery)==0) {
				print "Error! Page doesn't exist.";
			  } else {
				$eachData=mysqli_fetch_array($getDataQuery);
				$dataID = $eachData['id'];
				$dataTitle = $eachData['title'];
				$dataImg = $eachData['image'];
				$dataDetails=html_entity_decode($eachData['details']);
				$shortDataDetails=substr(strip_tags($dataDetails), 0, 600);
				
				print "<img src='$common_path/uploads/aboutus/$dataImg' border='0' alt='$dataName' title='$dataName' class='post'>
			<div id='intro-text' class='post1'>
				<h1>$dataTitle</h1>
				<p>$shortDataDetails [...]</p><br><br>";
		          }
		        ?>
				<a href="<?php echo $common_path;?>/aboutus.php?id=$dataID" class="dark">Read More</a></div>
			<div class="clear"></div>
		</div>
	</div>
</section>

<section id="message-content">
	<div class="container clearfix">
		<div id="message">
			<?php
				$query=mysqli_query($con, "select * from aboutus order by RAND() limit 1");
				while ($getDataDetails=mysqli_fetch_array($query)) {
					$img = $getDataDetails['image'];
					$dataID = $getDataDetails['id'];
					$dataTitle = $getDataDetails['title'];
					$dataImg = $getDataDetails['image'];
					$dataDetails=html_entity_decode($getDataDetails['details']);
					$shortDataDetails=substr(strip_tags($dataDetails), 0, 600);
					print "<img src='$common_path/uploads/aboutus/$dataImg' border='0' alt='$dataName' title='$dataName' class='post1'>
					<div id='message-text' class='post'><h1>$dataTitle</h1><p>$shortDataDetails [...]</p><br><br>
					<a href='$common_path/aboutus.php?id=$dataID' class='dark'>Read More</a></div>";
				}
			?>
		</div>
	</div>
</section>

<section id="course-content">
	<div class="container clearfix">
		<h1>Sports Climbing</h1>
		<div id="owl-demo1" class="owl-carousel owl-theme1">
			<?php
				$result=mysqli_query($con, "select * from sports_climbing order by position asc");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=html_entity_decode($each_row['title']);
					$dataImage=$each_row['image'];
					$dataDetails=html_entity_decode($each_row['details']);
					$dataShortDetails=substr(strip_tags($dataDetails), 0, 150);

					print "<div class='item course post'>
								<a href='$common_path/sports-climbing.php?id=$dataID'><img u='image' src='$common_path/uploads/sports_climbing/$dataImage' alt=''/></a>
								<div class='course-text'>
									<a href='$common_path/sports-climbing.php?id=$dataID'>$dataTitle</a>
								</div>
							</div>";				
				}
			?>
		</div>
	</div>
</section>

<section id="alpine-content">
	<div class="container clearfix">
		<h1>Alpine Training</h1>
		<div id="owl-demo2" class="owl-carousel owl-theme2">
			<?php
				$result=mysqli_query($con, "select * from alpine_training order by position asc");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=html_entity_decode($each_row['title']);
					$dataImage=$each_row['image'];
					$dataDetails=html_entity_decode($each_row['details']);
					$dataShortDetails=substr(strip_tags($dataDetails), 0, 150);

					print "<div class='item alpine post'>
								<a href='$common_path/alpine-training.php?id=$dataID'><img u='image' src='$common_path/uploads/alpine_training/$dataImage' alt=''/></a>
								<div class='alpine-text'>
									<a href='$common_path/alpine-training.php?id=$dataID'>$dataTitle</a>
								</div>
							</div>";				
				}
			?>
		</div>
	</div>
</section>

<section id="activities-content">
	<div class="container clearfix">
		<h1>Activities</h1>
		<div id="owl-demo3" class="owl-carousel owl-theme3">
			<?php
				$result=mysqli_query($con, "select * from activities order by position asc");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=html_entity_decode($each_row['title']);
					$dataImage=$each_row['image'];
					$dataDetails=html_entity_decode($each_row['details']);
					$dataShortDetails=substr(strip_tags($dataDetails), 0, 150);

					print "<div class='item activities post'>
								<a href='$common_path/activities.php?id=$dataID'><img u='image' src='$common_path/uploads/activities/$dataImage' alt=''/></a>
								<div class='activities-text'>
									<a href='$common_path/activities.php?id=$dataID'>$dataTitle</a>
								</div>
							</div>";				
				}
			?>
		</div>
	</div>
</section>

<section id="video-content">
	<div class="container clearfix">
		<h1>Featured Video</h1>
		<div id="video-text" class="post">
			<?php
				$queryVideo = mysqli_query($con, "select * from video");
				while ($eachVideo = mysqli_fetch_array($queryVideo)){
					$dataTitle = $eachVideo['title'];
					$dataUrl = $eachVideo['url'];
					$dataDetails = $eachVideo['details'];

					print "<h2>$dataTitle</h2>
							<p>$dataDetails</p>";
				}
			?>
		</div>
		<div id="video" class="post1">
			<object>
			  <param name="movie"
					 value="<?php print $dataUrl;?>?version=3&autoplay=0&controls=0&rel=0"></param>
			  <param name="allowScriptAccess" value="always"></param>
			  <embed src="<?php print $dataUrl;?>?version=3&autoplay=0&controls=0&rel=0"
					 type="application/x-shockwave-flash"
					 allowscriptaccess="always"
					 width="100%" height="100%"></embed>
			</object>
		</div>
	</div>
</section>

<section id="updates-content">
	<div class="container clearfix">
		<h1>Latest News</h1>
		<?php
			$result=mysqli_query($con, "select * from latest_news order by id desc limit 3");
			while ($each_row=mysqli_fetch_array($result)){
				$dataID=$each_row['id'];
				$dataTitle=html_entity_decode($each_row['title']);
				$dataImage=$each_row['image'];
				$dataDate=$each_row['posted_date'];

				print "<div class='updates post'>
						<img u='image' src='$common_path/uploads/latest_news/$dataImage' alt=''/>
						<div class='updates-text'>
							<a href='$common_path/latest-news.php?id=$dataID'>$dataTitle</a><br><br>
							<p>Posted: $dataDate</p>
						</div>
					</div>";				
			}
		?>
	</div>
</section>

<section id="testimonials-content">
	<div class="container clearfix">
		<h1>Testimonials</h1>
		<?php
					$getDataQuery=mysqli_query($con, "select * from testimonials order by position asc limit 2");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "";
					} else {
						while ($eachData=mysqli_fetch_array($getDataQuery)) {
							$dataTitle=$eachData['title'];
							$dataImg=$eachData['image'];
							$dataDetails=html_entity_decode($eachData['details']);
							print "<div class='testimonials post'>
			<a href=''><img src='$common_path/uploads/testimonials/$dataImg' border='0' alt=''></a>
			<p><strong>$dataTitle</strong><br><br>$dataDetails</p></div>";
						}
					}
			?>
		
		
	</div>
</section>

<section id="affiliations-content">
	<div class="container clearfix">
		<h1>Authorized by</h1>
		<div id="owl-demo4" class="owl-carousel owl-theme4">
			<?php	
					$result=mysqli_query($con, "select * from affiliations order by position asc limit 4");

					if (mysqli_num_rows($result)>0) {
						while ($eachData=mysqli_fetch_array($result)) {
							$dataID=$eachData['id'];
							$dataTitle=$eachData['title'];
							$dataLink=$eachData['link'];
							$dataImg=$eachData['image'];
							print "<div class='affiliations item post'>
								<a href='$common_path/authorized.php?id=$dataID'><img src='$common_path/uploads/affiliations/$dataImg' border='0' alt='$dataTitle' title='$dataTitle'></a>
								</div>";
							
						}
					}
				?>
		</div>
	</div>
</section>

<?php include 'footer.php';?>
