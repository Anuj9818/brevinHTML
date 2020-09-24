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
	<?php
		$id=intval($_GET["id"]);

		$getDataQuery=mysqli_query($con, "select * from affiliations where id='$id'");								
		$eachData=mysqli_fetch_array($getDataQuery);
		$dataTitle=$eachData['title'];
		print "<h1>$dataTitle</h1>";
	?>
	</div>
</section>

<section id="subpage">
	<div class="container">
		<?php
				$id=intval($_GET["id"]);

					$getDataQuery=mysqli_query($con, "select * from affiliations where id='$id'");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! News doesn't exist.";
					} else {
						$eachData=mysqli_fetch_array($getDataQuery);
						$dataImg=$eachData['image'];
						$dataLink=$eachData['link'];
						$dataDetails=html_entity_decode($eachData['details']);
						print "<a href='$dataLink' target='_blank'><img src='$common_path/uploads/affiliations/$dataImg' alt='$dataTitle'></a><br>
						<p>$dataDetails</p>";
					};
			?>
		<div class="clear"></div>
	</div>
</section>

<?php include 'footer.php';?>


