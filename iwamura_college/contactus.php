<?php
require 'config.php';
require 'dbconnect.php';
include 'head.php';
$selectedMenu="home";
include 'header.php';
include 'inc/notice-board.php';
?>



<div class="content-wrap">
	<div class="content">
		<div class="subpage">
			<h1>Contact Us</h1>
			<?php

				$getDataQuery=mysqli_query($con, "select * from contactus");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Page doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataDetails=html_entity_decode($eachData['details']);
					print "$dataDetails";
				}

			?>
		</div>
		<?php include 'sidebar.php'; ?>
		
		<div class="clear"></div>
	</div>
</div>

<?php
include 'footer.php';
?>