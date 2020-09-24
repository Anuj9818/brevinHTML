<?php
require 'config.php';
require 'dbconnect.php';
include 'head.php';
?>

<?php
	$result = mysqli_query($con, "select * from popup ORDER by id desc limit 1");
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
include 'header.php';
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
					$dataImage=$each_row['image'];
					print "<div class='item'><img u='image' src='$common_path/uploads/highlight_big/$dataImage' alt='$dataTitle'></div>";				
				}
			?>
		</div>
	</div>
</div>

<?php
include 'inc/notice-board.php';
?>

<div class="content-wrap">
	<div class="content">
		<div class="message-home">
			<?php
				$getDataQuery=mysqli_query($con, "select * from message order by id asc limit 1");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Page doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataID=$eachData['id'];
					$dataName=$eachData['name'];
					$dataDesignation=$eachData['designation'];
					$dataName=$eachData['name'];
					$dataImg=$eachData['image'];
					$dataDetails=html_entity_decode($eachData['details']);
					$dataShortDetails=substr(strip_tags($dataDetails), 0, 250);
					print "<h1>$dataDesignation' s Message</h1>
							<img src='$common_path/uploads/message/$dataImg' border='0' alt='$dataName'>
							<p>$dataShortDetails...<a href='$common_path/message.php?id=$dataID'>READ MORE</a><br><br><b>$dataName</b></p>";
				}

			?>
			<div class="clear"></div>
		</div>
		<div class="course-home">
			<h1>Our Courses</h1>
			<ul>
			<?php
				$result=mysqli_query($con, "select * from academics order by position asc");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=$each_row['title'];
					print "<li><a href=\"$common_path/academic-programs.php?id=$dataID\">$dataTitle</a></li>";				
				}
			?>
			</ul>
		</div>
		<div class="right">
			<div class="news-home">
				<h1>Latest News</h1>
				<ul>
					<?php
						$result=mysqli_query($con, "select * from news order by id desc limit 3");
						while ($each_row=mysqli_fetch_array($result)){
							$dataID=$each_row['id'];
							$dataTitle=$each_row['title'];
							$dataDate=date("M d, Y", strtotime($each_row['added_date']));
							print "<li>$dataDate<br><a href='$common_path/news.php?id=$dataID'>$dataTitle</a></li>";				
						}
					?>
					<li><a href="<?php echo $common_path;?>/news.php">view all</a></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="gallery-home-warp">
	<div class="gallery-home">
		<h1>Activities</h1>
		<ul>
			<?php
				$query = "select * from gallery_name order by id desc limit 4";
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
								$img = $eachPhotos['img_name'];
								print "<li><a href='$common_path/gallery.php?id=$dataID'><p class='zero'><h2>$dataTitle</h2>$dataDate</p>
										<img src='$common_path/uploads/gallery/$img' border='0' alt=''></a></li>";
										}
						}								
					}
				}
			?>
		</ul>
		<div class="clear"></div>
	</div>
</div>

<?php
include 'footer.php';
?>