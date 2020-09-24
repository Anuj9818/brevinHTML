<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>


<?php
$selectedMenu="about";
include 'header.php';
?>

<section id="header-about">
	<div class="container">
	<h1>Testimonials</h1>
	</div>
</section>

<section id="subpage">
	<div class="container">
		<?php
					$getDataQuery=mysqli_query($con, "select * from testimonials order by position asc");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! Data doesn't exist.";
					} else {
						while ($eachData=mysqli_fetch_array($getDataQuery)) {
							$dataName=$eachData['name'];
							$dataImg=$eachData['image'];
							$dataDetails=html_entity_decode($eachData['details']);
							print "<article class='clearfix'><img src='$common_path/uploads/testimonials/$dataImg' alt='$dataName' class='sub-img1'><p><b>$dataName</b><br>$dataDetails</p></article>";
						}
					}
			?>
		<div class="clear"></div>
	</div>
</section>

<?php include 'footer.php';?>


