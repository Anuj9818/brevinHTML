<?php
require 'config.php';
require 'dbconnect.php';
require 'inc/function.php';
require 'head.php';
$selectedMenu="news";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<h1>News & Notices</h1>
			<?php
				$id=intval($_GET["id"]);
				
				if ($id > 0) {

					$getDataQuery=mysqli_query($con, "select * from news where id='$id'");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! News doesn't exist.";
					} else {
						$eachData=mysqli_fetch_array($getDataQuery);
						$dataTitle=html_entity_decode($eachData['title']);
						$dataDate=html_entity_decode($eachData['added_date']);
						$dataDetails=html_entity_decode($eachData['details']);
						print "<h2>$dataTitle</h2>
							Posted: $dataDate<br><br>
							$dataDetails";
					}

				} else {

					$query = "select * from news order by id desc";
					$result = mysqli_query($con, $query);
					$totalrows = mysqli_num_rows($result);
					if ($totalrows == 0) {
						print "Sorry! No Data Exist";
					} else {

						print "<ul class='listings'>";

						
						while($query = mysqli_fetch_array($result)) {
							$dataID=$query['id'];
							$dataTitle=html_entity_decode($query['title']);
							$dataDate=html_entity_decode($query['added_date']);
							$dataDetails=html_entity_decode($query['details']);

							$dataShortDetails=substr(strip_tags($dataDetails), 0, 160);

							print "<li><a href='$common_path/news.php?id=$dataID' class=\"seeDetailMenu\">$dataTitle</a><br>
								Posted: $dataDate<br>$dataShortDetails ...</li>";

							
						}

						print "</ul><br><br>";
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
