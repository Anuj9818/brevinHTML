<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="aboutus";
include 'header.php';
?>

<section id="subpage-top">
	<div class="container">
		<h1>Introduction</h1>
	</div>
</section>
<section id="subpage-wrap">
	<div class="container clearfix">
		<div id="subpage-full" class="clearfix post">
			<?php
			$getDataQuery=mysqli_query($con, "select * from introduction");								
			if(mysqli_num_rows($getDataQuery)==0) {
				print "Error! Page doesn't exist.";
			} else {
				$eachData=mysqli_fetch_array($getDataQuery);
				$dataTitle=html_entity_decode($eachData['title']);
				$dataDetails=html_entity_decode($eachData['details']);
				print "<h1>$dataTitle</h1><br><p>$dataDetails</p>";
			}

		?>
	
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>



