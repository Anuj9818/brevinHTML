<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>

<?php
	$result = mysqli_query($con, 'select * from popup ORDER by id desc limit 1');
	$getData = mysqli_fetch_array($result);
		$dataImage = $getData['img_name'];
		$dataActive = $getData['active'];

		$popupindex = '<div id="boxes">
			<div style="top: 199.5px; left: 551.5px; display: none;" id="dialog" class="window">
			<IMG SRC="'.$common_path.'/uploads/popup/'.$dataImage.'" BORDER="0" ALT=""><br>
			<a href="#" class="close" style="font:normal 9pt arial;" align="center">Close it</a>
			</div>
			<div style="width: 100%; height: 100%; display: none; opacity: 0.8;" id="mask"></div>
		</div>';

		if($dataActive == "Yes")
		{
			echo("$popupindex");
		}
		else
		{
			echo("");
		}
	
	?>

<?php
$selectedMenu="home";
require 'header.php';
?>

<div class="slider">
	<div class="span12">
		<div id="owl-demo" class="owl-carousel">
			<?php
				$loopi=0;
				$result=mysqli_query($con, "select * from highlight_big order by position asc");
				while ($each_row=mysqli_fetch_array($result)){
					$loopi++;
					$dataID=$each_row['id'];
					$dataTitle=html_entity_decode($each_row['title']);
					$dataSubTitle=html_entity_decode($each_row['sub_title']);
					$dataImage=$each_row['image'];
					print "<div class='item'><h1>$dataTitle</h1><h2>$dataSubTitle</h2><img u='image' src='$common_path/uploads/highlight_big/$dataImage' alt='$dataTitle'></div>";				
				}
			?>
		</div>
	</div>
</div>

<div id="home-facilities">
	<div class="container">
		<div id="owl-demo2" class="owl-carousel owl-theme2">
			<?php
				$result=mysqli_query($con, "select * from home_articles order by position asc limit 10");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=$each_row['title'];
					$dataImage=$each_row['image'];
					$dataDetails=html_entity_decode($each_row['details']);

					print "<div class='home-facilities-list item'>
							<a href='$common_path/home-articles.php?id=$dataID'>
								<img src='$common_path/uploads/home_articles/$dataImage' border='0' alt='$dataTitle'>
								<div class='home-facilities-content'>
									<a href='$common_path/home-articles.php?id=$dataID'><h1>$dataTitle</h1></a>
									<p>$dataDetails</p>
								</div>
							</div>";				

				}
			?>
		</div>
	</div>
</div>

<div id="content-wrap">
	<div id="content">
		

		<div id="home-banner">
			<ul>
				<li><a href="<?php echo $common_path;?>/health-packages.php">Health Packages</a></li>
				<li><a href="<?php echo $common_path;?>/departments.php">Our Departments</a></li>
				<li><a href="<?php echo $common_path;?>/contactus.php">Make an appointment</a></li>
				
			</ul>
			<div class="clear"></div>
		</div>
	</div>
</div>

<div id="home-news">
	<div class="container">
		<h1>Latest News & Notices</h1><br>
		<div id="owl-demo3" class="owl-carousel owl-theme3">
			<?php
				$result=mysqli_query($con, "select * from news order by posted_date asc limit 10");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=$each_row['title'];
					$dataImage=$each_row['image'];
					$dataDetails=html_entity_decode($each_row['details']);
					$dataShortDetails=substr(strip_tags($dataDetails), 0, 100);
					print "<div class='home-news-list item'>
							<a href='$common_path/news.php?id=$dataID'>
							<img src='$common_path/uploads/news/$dataImage' border='0' alt='$dataTitle'>
							<div class='home-news-content'>
								<a href='$common_path/news.php?id=$dataID'>$dataTitle</a>
								<p>$dataShortDetails ...</p>
							</div>
						</div>";				
				}
			?>
		</div>
	</div>
</div>

<section id="gallery_section">
	<div class="container clearfix">
		<h1>Photo Gallery</h1>
		<div id="owl-demo4" class="owl-carousel owl-theme4">
		<?php
			$query = "select * from gallery_name order by posted_date desc limit 8";
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
							print "<div class='gallery_list item'>
										<a href='$common_path/gallery.php?id=$dataID'><img src='$common_path/uploads/gallery/$dataImg' border='0' alt='$dataTitle' title='$dataTitle' class='post'></a><p><a href='$common_path/gallery.php?id=$dataID'></a><p><a href='$common_path/gallery.php?id=$dataID'>$dataTitle</a></p>
									</div>";
						}
					}
				}
		}
		?>
		</div>
	</div>
	
</section>

<?php
require 'footer.php';
?>
