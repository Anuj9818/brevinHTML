<?php
require 'config.php';
require 'dbconnect.php';
include 'head.php';
$selectedMenu="aboutus";
include 'header.php';
include 'inc/notice-board.php';
?>

<div class="content-wrap">
	<div class="content">
		<div class="subpage">
			<h1>Testimonials - [<a href="<?php echo $common_path;?>/testimonial.php" style="font-size:11pt;">Back</a>]</h1>
			<?php
			$id=intval($_GET["id"]);
			
			if ($id > 0) {

				$getDataQuery=mysqli_query($con, "select * from testimonial where id='$id'");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Data doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataName=html_entity_decode($eachData['name']);
					$dataBatch=html_entity_decode($eachData['batch']);
					$dataDetails=html_entity_decode($eachData['details']);
					$dataImg=$eachData['image'];
					print "<img src='$common_path/uploads/testimonial/$dataImg' width='200px' border='0' alt='$dataName' style='float:left; margin:0 20px 20px 0;'><p style='float:right;'><h2>$dataName</h2><h3>$dataBatch</h3><br>$dataDetails</p>";
				}

			} else {

				$query = "select * from testimonial order by id desc";
				$result = mysqli_query($con, $query);
				$totalrows = mysqli_num_rows($result);
				if ($totalrows == 0) {
					print "Sorry! No Data Exist";
				} else {

					print "<ul>";

					while($query = mysqli_fetch_array($result)) {

						$dataID=$query['id'];
						$dataName=html_entity_decode($query['name']);
						$dataBatch=html_entity_decode($query['batch']);
						$dataDetails=html_entity_decode($query['details']);
						$dataShortDetails=substr(strip_tags($dataDetails), 0, 160);
						$dataImg=$query['image'];

						print "<li><a href='$common_path/testimonial.php?id=$dataID'><img src='$common_path/uploads/testimonial/$dataImg' width='100px' border='0' alt='$dataName' style='float:left; margin:0 20px 0 0;'></a>
							<p><h2>$dataName</h2><h3>$dataBatch</h3>
							
								$dataShortDetails ...
								<a href='$common_path/testimonial.php?id=$dataID' class='underline'>read more</a>
							</p><br>
						</li>";

						
					}

					print "</ul><br>";
				}
			}
		?>
				<div class="clear"></div>
		</div>
		<?php include 'sidebar.php'; ?>
		
		<div class="clear"></div>
	</div>
</div>

<?php
include 'footer.php';
?>