<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="home";
include 'header.php';
?>

<div id="slider" >
	<!-- Jssor Slider Begin -->
	<!-- You can move inline styles to css file or css block. -->
	<div id="slider1_container" style="position: relative; margin: 0 auto;
		top: 0px; left: 0px; width: 2000px; height: 700px; overflow: hidden;">
		<!-- Loading Screen -->
		<div u="loading" style="position: absolute; top: 0px; left: 0px;">
			<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
				top: 0px; left: 0px; width: 100%; height: 100%;">
			</div>
			<div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
				top: 0px; left: 0px; width: 100%; height: 100%;">
			</div>
		</div>
		<!-- Slides Container -->
		<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 2000px;
			height: 700px; overflow: hidden;">
			<?php
				$loopi=0;
				$result=mysqli_query($con, "select * from big_slider order by position asc");
				while ($each_row=mysqli_fetch_array($result)){
					$loopi++;
					$dataID=$each_row['id'];
					$dataTitle=html_entity_decode($each_row['title']);
					$dataImage=$each_row['image'];
					print "<div><img u='image' src='$common_path/uploads/big_slider/$dataImage' alt=''/></div>";				
				}
			?>
			
				
		<!-- Bullet Navigator Skin Begin -->
			<style>
				/* jssor slider bullet navigator skin 21 css */
				/*
				.jssorb21 div           (normal)
				.jssorb21 div:hover     (normal mouseover)
				.jssorb21 .av           (active)
				.jssorb21 .av:hover     (active mouseover)
				.jssorb21 .dn           (mousedown)
				*/
				.jssorb21 div, .jssorb21 div:hover, .jssorb21 .av
				{
					background: url(images/b21.png) no-repeat;
					overflow:hidden;
					cursor: pointer;
				}
				.jssorb21 div { background-position: -5px -5px; }
				.jssorb21 div:hover, .jssorb21 .av:hover { background-position: -35px -5px; }
				.jssorb21 .av { background-position: -65px -5px; }
				.jssorb21 .dn, .jssorb21 .dn:hover { background-position: -95px -5px; }
			</style>
			<!-- bullet navigator container -->
			<div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
				<!-- bullet navigator item prototype -->
				<div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
			</div>
			<!-- Bullet Navigator Skin End -->

			<!-- Arrow Navigator Skin Begin -->
			<style>
				/* jssor slider arrow navigator skin 21 css */
				/*
				.jssora21l              (normal)
				.jssora21r              (normal)
				.jssora21l:hover        (normal mouseover)
				.jssora21r:hover        (normal mouseover)
				.jssora21ldn            (mousedown)
				.jssora21rdn            (mousedown)
				*/
				.jssora21l, .jssora21r, .jssora21ldn, .jssora21rdn
				{
					position: absolute;
					cursor: pointer;
					display: block;
					background: url(images/a21.png) center center no-repeat;
					overflow: hidden;
				}
				.jssora21l { background-position: -3px -33px; }
				.jssora21r { background-position: -63px -33px; }
				.jssora21l:hover { background-position: -123px -33px; }
				.jssora21r:hover { background-position: -183px -33px; }
				.jssora21ldn { background-position: -243px -33px; }
				.jssora21rdn { background-position: -303px -33px; }
			</style>
			<!-- Arrow Left -->
			<span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
			</span>
			<!-- Arrow Right -->
			<span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px">
			</span>
			<!-- Arrow Navigator Skin End -->
	</div>
	<!-- Jssor Slider End -->
</div>

<section id="intro-section">
	<div class="container clearfix">
		<?php
			  $getDataQuery=mysqli_query($con, "select * from introduction");               
			  if(mysqli_num_rows($getDataQuery)==0) {
				print "Error! Page doesn't exist.";
			  } else {
				$eachData=mysqli_fetch_array($getDataQuery);
				$dataTitle=html_entity_decode($eachData['title']);
				$dataHome=html_entity_decode($eachData['home']);
				print "<h1>$dataTitle</h1><p>$dataHome</p>";
			  }
			?><a href="<?php echo $common_path;?>/introduction.php">Read More</a>
	</div>
</section>

<section id="services-wrap" class="clearfix">
	<div class="container">
		<h1>SERVICES</h1>
		<?php
			$listing=mysqli_query($con, "select * from services order by position");
			while ($each_row=mysqli_fetch_array($listing)){
				$dataID=$each_row['id'];
				$dataTitle=$each_row['title'];
				$dataImage=$each_row['image'];
				print "<div class='services-list'><img u='image' src='$common_path/uploads/services/$dataImage'><br><a href='$common_path/services.php?id=$dataID' class='services post'>$dataTitle</a></div>";				
			}
		?>
	</div>
</section>

<section id="clients-content">
	<div class="container clearfix">
		<div class='set set-1'>
				<div class='panel panel-1'><h2>Colleges</h2>
				<?php
					$result=mysqli_query($con, "select * from clients where category='Colleges' order by position asc limit 16");
					while ($each_row=mysqli_fetch_array($result)){
						$dataID=$each_row['id'];
						$dataTitle=html_entity_decode($each_row['title']);
						$dataLink=html_entity_decode($each_row['link']);
						$dataImage=$each_row['image'];
						print "<div class='clients'><a href='$dataLink' target='_blank'><img u='image' src='$common_path/uploads/clients/$dataImage' alt='$dataTitle' title='$dataTitle'></a><br><p>$dataTitle</p></div>";
					}
				?>	
				</div>
				<div class='panel panel-1'><h2>Universities</h2>
				<?php
					$result=mysqli_query($con, "select * from clients where category='Universities' order by position asc limit 16");
					while ($each_row=mysqli_fetch_array($result)){
						$dataID=$each_row['id'];
						$dataTitle=html_entity_decode($each_row['title']);
						$dataLink=html_entity_decode($each_row['link']);
						$dataImage=$each_row['image'];
						print "<div class='clients'><a href='$dataLink' target='_blank'><img u='image' src='$common_path/uploads/clients/$dataImage' alt='$dataTitle' title='$dataTitle'></a><br><p>$dataTitle</p></div>";
					}
				?>
				</div>
				
			</div>

		<div id="owl-demo2" class="owl-carousel owl-theme2">
			
		</div>
	</div>
</section>

<section id="testimonials-content">
	<div class="container clearfix">
		<h1>TESTIMONIALS</h1>
		<div id="owl-demo3" class="owl-carousel owl-theme3">
			<?php
				$result=mysqli_query($con, "select * from testimonials order by position asc limit 6");								
				while($eachData=mysqli_fetch_array($result)){
					$dataID=$eachData['id'];
					$dataName=$eachData['name'];
					$dataDestination=$eachData['destination'];
					$dataImage=$eachData['image'];
					$dataDetails=html_entity_decode($eachData['details']);

					print "<div class='testimonials item clearfix'>
								<img src='$common_path/uploads/testimonials/$dataImage' alt='$dataName' class='post'>
								<p class='post1'>$dataDetails<br><br>$dataName<br>$dataDestination</p>
							</div>";
				}
			?>
		</div>
	</div>
</section>

<div id="clients-content">
	<div class="container clearfix">
		<h1>GALLERY</h1>
		<?php
			$query = "select * from gallery_name order by posted_date desc limit 4";
			$result = mysqli_query($con, $query);
			$totalrows = mysqli_num_rows($result);
			if ($totalrows == 0) {
				print "Sorry! No Data Exist";
			} else {
				$rpp = 6; // results per page
				$adjacents = 8;
				$page = intval($_GET["page"]);
				if(!$page) $page = 1;
				$reload = "gallery.php?";

				// select appropriate results from DB:
				$result = mysqli_query($con, $query);

				// count total number of appropriate listings:
				$tcount = mysqli_num_rows($result);

				while(($count<$rpp) && ($i<$tcount)) {
					mysqli_data_seek($result,$i);
					$query = mysqli_fetch_array($result);
					$i++;
					$count++;
					$dataID=$query['id'];
					$dataTitle=html_entity_decode($query['title']);
					$dataShortTitle=substr(strip_tags($dataTitle), 0, 25);
					$dataDate=date("M d, Y", strtotime($query['posted_date']));

					$getPhotos = mysqli_query($con, "select * from gallery_image where gallery_id='$dataID' order by RAND() limit 1");

					if (mysqli_num_rows($getPhotos) > 0) {
						while ($eachPhotos = mysqli_fetch_array($getPhotos)) {
							$dataImg = $eachPhotos['img_name'];
							print "<div class='gallery_list'>
										<a href='$common_path/gallery.php?id=$dataID'><img src='$common_path/uploads/gallery/$dataImg' border='0' alt='$dataTitle' title='$dataTitle' class='post'></a><p><a href='$common_path/gallery.php?id=$dataID'></a><p><a href='$common_path/gallery.php?id=$dataID'>$dataTitle</a>$dataDate</p>
									</div>";
						}
					}
				}
		}
		?>
	</div>
	
</div>

<?php
include 'footer.php';
?>



