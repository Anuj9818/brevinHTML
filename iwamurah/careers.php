<?php
require 'config.php';
require 'dbconnect.php';
require 'inc/function.php';
require 'head.php';
$selectedMenu="careers";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<h1>Careers</h1>
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
		<?php require 'sidebar.php';?>
		<div class="clear"></div>
	</div>
</div>

<?php
require 'footer.php';
?>
