<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
$selectedMenu="packages";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<?php
				$id=intval($_GET["id"]);
				
				if ($id > 0) {

					$getDataQuery=mysqli_query($con, "select * from health_packages where id='$id'");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! News doesn't exist.";
					} else {
						$eachData=mysqli_fetch_array($getDataQuery);
						$dataTitle=html_entity_decode($eachData['title']);
						$dataImage=$eachData['image'];
						$dataDetails=html_entity_decode($eachData['details']);
						print "<h1>$dataTitle</h1>
							<img src='$common_path/uploads/health_packages/$dataImage' style='float:left; margin:0 30px 30px 0;'>$dataDetails";
					}

				} else {

					$query = "select * from health_packages order by id desc";
					$result = mysqli_query($con, $query);
					$totalrows = mysqli_num_rows($result);
					if ($totalrows == 0) {
						print "Sorry! No Data Exist";
					} else {

						print "<h1>Health Packages</h1><ul class='listings'>";

						while($query = mysqli_fetch_array($result)) {

							$dataID=$query['id'];
							$dataTitle=html_entity_decode($query['title']);
							$dataImage=$query['image'];
							$dataDetails=html_entity_decode($query['details']);
							$dataShortDetails=substr(strip_tags($dataDetails), 0, 260);

							print "<li><br><img src='$common_path/uploads/health_packages/$dataImage' alt='$dataTitle' style='float:left; margin:0 30px 30px 0;'><a href='$common_path/services.php?id=$dataID'><h3>$dataTitle</h3></a>
								$dataShortDetails ... <a href='$common_path/health-packages.php?id=$dataID'>read more</a></li><hr class='clear'><br>";

							
						}

						print "</ul>";
					}
				}
			?>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php
require 'footer.php';
?>
