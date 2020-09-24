<?php
require 'config.php';
require 'dbconnect.php';
include 'head.php';
$selectedMenu="";
include 'header.php';
include 'inc/notice-board.php';
?>

<div class="content-wrap">
	<div class="content">
		<div class="subpage">
			<h1>Careers @ Iwamura College</h1>
			<?php
				$getDataQuery=mysqli_query($con, "select * from careers");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Page doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataTitle=html_entity_decode($eachData['title']);
					$dataDetails=html_entity_decode($eachData['details']);
					print "<h3>$dataTitle</h3>$dataDetails<br><br>";
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