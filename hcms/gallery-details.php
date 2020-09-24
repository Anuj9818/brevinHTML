<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>


<?php
$selectedMenu="news";
include 'header.php';
?>

<section id="header-about">

</section>

<section id="subpage">
	<div class="container">
		<h1><a href="gallery.php">Go Back to Gallery</a></h1>
		<?php
			$id=intval($_GET["id"]);
			$page=intval($_GET["page"]);
			$linkedPage="gallery.php";
			
			if ($id=="0") {
				$getLatestGallery=mysqli_fetch_array(mysqli_query($con, "select * from gallery_name order by posted_date desc, id desc limit 1"));
				$id=$getLatestGallery['id'];
			}

			$getDataQuery=mysqli_query($con, "select * from gallery_name where id='$id'");								
			if(mysqli_num_rows($getDataQuery)==0) {
				print "Error! Data doesn't exist.";
			} else {
				$eachData=mysqli_fetch_array($getDataQuery);
				$dataTitle=html_entity_decode($eachData['title']);
				$dataDetails=html_entity_decode($eachData['details']);
				$dataDate=date("M d, Y", strtotime($eachData['posted_date']));

				print "<h2>$dataTitle</h2>";
				print "<h4>Date: $dataDate</h4>";
				print "<p>$dataDetails</p>";

				print "<div style=\"margin-top: 0px;\">";
				$getPhotos=mysqli_query($con, "select * from gallery_image where gallery_id='$id' order by id desc");
				if (mysqli_num_rows($getPhotos)>0) {
					print "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"10\">";
					print "<tr>";
					$i=0;
					while ($eachPhotos=mysqli_fetch_array($getPhotos)) {
						$i++;
						$dataImg=$eachPhotos['img_name'];
						print "<td>
							<a href=\"$common_path/uploads/gallery/$dataImg\" data-lightbox='roadtrip' title=\"$dataTitle\"><img src='$common_path/uploads/gallery/$dataImg' border='0' alt='$dataTitle'></a>
						</td>";
						if ($i%5==0) {
							print "</tr>";
						}
					}
					print "</table>";
				} else {
					print "<div class=\"txt\" style=\"padding: 20px; color: #d51818;\">Photos doesn't exist.</div>";
				}
				print "</div>";
			}
			?>
	</div>
</section>

<?php include 'footer.php';?>


