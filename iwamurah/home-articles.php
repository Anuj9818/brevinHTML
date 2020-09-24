<?php
require 'config.php';
require 'dbconnect.php';
require 'inc/function.php';
require 'head.php';
$selectedMenu="";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<h1>Highlight Articles</h1>
			<?php
				$id=intval($_GET["id"]);
				
				if ($id > 0) {

					$getDataQuery=mysqli_query($con, "select * from home_articles where id='$id'");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! Data doesn't exist.";
					} else {
						$eachData=mysqli_fetch_array($getDataQuery);
						$dataTitle=$eachData['title'];
						$dataDate=$eachData['date'];
						$dataImage=$eachData['image'];
						$dataDetails=html_entity_decode($eachData['details']);
						print "<h2>$dataTitle</h2>
							<IMG SRC='$common_path/uploads/home_articles/$dataImage' ALT=\"$dataName\" style='float:left; margin:0 5% 5% 0;'>$dataDate<br>$dataDetails";
					}

				} else {

					$query = "select * from home_articles order by position asc";
					$result = mysqli_query($con, $query);
					$totalrows = mysqli_num_rows($result);
					if ($totalrows == 0) {
						print "Sorry! No Data Exist";
					} else {

						print "<ul class='listings'>";

						while($query = mysqli_fetch_array($result)) {

							$dataID=$query['id'];
							$dataTitle=$query['title'];
							$dataDate=$query['date'];
							$dataImage=$query['image'];
							$dataDetails=html_entity_decode($query['details']);

							$dataShortDetails=substr(strip_tags($dataDetails), 0, 200);

							print "<li><IMG SRC=\"$common_path/uploads/home_articles/$dataImage\" ALT=\"$dataName\" style='float:left; margin:0 20px 20px 0;'><a href='$common_path/news-recent.php?id=$dataID' class='titleMenu'>$dataTitle</a><br>$dataDate<br><br>
								$dataShortDetails ... <a href='$common_path/home-articles.php?id=$dataID'>read more</a><br class='clear'></li>";

							
						}

						print "</ul>";
					}
				}
			?>
			<div class="clear"></div>
		</div>
		<div class="right">
			<div class="news">
				<h1>Highlight Articles</h1>
				<ul>
					<?php
						$result=mysqli_query($con, "select * from home_articles order by position asc");
						while ($each_row=mysqli_fetch_array($result)){
							$dataID=$each_row['id'];
							$dataTitle=$each_row['title'];
							$dataDate=html_entity_decode($each_row['date']);
							print "<li><a href='$common_path/home-articles.php?id=$dataID' class=\"seeDetailMenu\">$dataTitle</a></li>";
						}
					?>
				</ul>
				<div class="clear"></div>
			</div>
			
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php
require 'footer.php';
?>
