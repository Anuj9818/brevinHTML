<?php
require 'config.php';
require 'dbconnect.php';
include 'head.php';
$selectedMenu="programs";
include 'header.php';
include 'inc/notice-board.php';
?>

<div class="content-wrap">
	<div class="content">
		<div class="subpage">
			<h1>Academic Programs</h1>
			<?php
				$getID = $_GET['id'];
				$getDataQuery=mysqli_query($con, "select * from academics where id=$getID");								
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