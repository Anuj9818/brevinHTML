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
	<div class="container">
		<h1>Latest News</h1>
	</div>
</section>

<section id="subpage">
	<div class="container">
		<?php
				$id=intval($_GET["id"]);
				
				if ($id > 0) {

					$getDataQuery=mysqli_query($con, "select * from latest_news where id='$id'");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! Data doesn't exist.";
					} else {
						$eachData=mysqli_fetch_array($getDataQuery);
						$dataTitle=$eachData['title'];
						$dataDate=$eachData['posted_date'];
						$dataImg=$eachData['image'];
						$dataDetails=html_entity_decode($eachData['details']);
						print "<h1>$dataTitle</h1><img src='$common_path/uploads/latest_news/$dataImg' alt='$dataTitle' class='sub-img'>
						<p>$dataDate<br><br>$dataDetails</p>";
					}

				} else {

					$query = "select * from latest_news order by posted_date desc";
					$result = mysqli_query($con, $query);
					$totalrows = mysqli_num_rows($result);
					if ($totalrows == 0) {
						print "Sorry! No Data Exist";
					} else {

						print "<ul class='list'>";

						while($query = mysqli_fetch_array($result)) {

							$dataID=$query['id'];
							$dataTitle=$query['title'];
							$dataDate=$query['posted_date'];
							$dataImg=$query['image'];
							$dataDetails=html_entity_decode($query['details']);

							$dataShortDetails=substr(strip_tags($dataDetails), 0, 160);

							print "<li>
								<a href='$common_path/latest-news.php?id=$dataID'><img src='$common_path/uploads/latest_news/$dataImg' border='0' alt='$dataName' title='$dataName'></a>
								<br><br><strong><a href='$common_path/latest-news.php?id=$dataID'>$dataTitle</a></strong><br>$dataDate<BR><BR>
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


