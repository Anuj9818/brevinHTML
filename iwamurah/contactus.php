<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
$selectedMenu="contactus";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<h1>Contact us</h1>
			<?php
				$getDataQuery=mysqli_query($con, "select * from contactus");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Content doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataDetails=html_entity_decode($eachData['details']);
					print "$dataDetails";
				}
			?>
			
		</div>

	</div>
	<div class="clear"></div><br><br>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.4364621440377!2d85.41213999999998!3d27.67290200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1a9a1d71e29b%3A0x3498959c8f7065b5!2sIwamura+Memorial+Hospital!5e0!3m2!1sen!2snp!4v1435224581109" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<?php
require 'footer.php';
?>
