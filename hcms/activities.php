<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>


<?php
$selectedMenu="activities";
include 'header.php';
?>

<section id="header-about">
	<div class="container">
	<?php
		$id=intval($_GET["id"]);

		$getDataQuery=mysqli_query($con, "select * from activities where id='$id'");								
		$eachData=mysqli_fetch_array($getDataQuery);
		$dataTitle=$eachData['title'];
		print "<h1>$dataTitle</h1>";
	?>
	</div>
</section>

<section id="subpage">
	<div class="container">
		<?php
				$id=intval($_GET["id"]);
				
				if ($id > 0) {

					$getDataQuery=mysqli_query($con, "select * from activities where id='$id'");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! Data doesn't exist.";
					} else {
						$eachData=mysqli_fetch_array($getDataQuery);
						$dataTitle=$eachData['title'];
						$dataImg=$eachData['image'];
						$dataDetails=html_entity_decode($eachData['details']);
						print "<img src='$common_path/uploads/activities/$dataImg' width='auto' alt='$dataTitle' class='sub-img'>
						<p>$dataDetails</p>";
					}

				} else {

					$query = "select * from activities order by position asc";
					$result = mysqli_query($con, $query);
					$totalrows = mysqli_num_rows($result);
					if ($totalrows == 0) {
						print "Sorry! No Data Exist";
					} else {

						print "<ul class='list'>";

						while($query = mysqli_fetch_array($result)) {

							$dataID=$query['id'];
							$dataTitle=$query['title'];
							$dataImg=$query['image'];
							$dataDetails=html_entity_decode($query['details']);

							$dataShortDetails=substr(strip_tags($dataDetails), 0, 160);

							print "<li>
								<a href='$common_path/activities.php?id=$dataID'>
								<img src='$common_path/inc/phpThumb-1.7.11/phpThumb.php?src=/uploads/activities/$dataImg&w=270&h=300&f=jpeg&zc=T' alt='$dataTitle'></a>
								<br><br><strong><a href='$common_path/activities.php?id=$dataID'>$dataTitle</a></strong><BR><BR>
						</li>";
							
						}

						print "</ul>";
					}
				}
			?>
		<div class="clear"></div>
	</div>
</section>

<?php include 'footer.php';?>


