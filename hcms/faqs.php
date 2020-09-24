<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>


<?php
$selectedMenu="";
include 'header.php';
?>

<section id="header-about">
	<div class="container">
	<h1>FAQs</h1>	</div>
</section>

<section id="subpage">
	<div class="container">
		<div class="applemenu">
			<h1>FAQs</h1>
			<?php
			$getDataQuery=mysqli_query($con, "select * from faqs order by position asc");								
						if(mysqli_num_rows($getDataQuery)==0) {
							print "Error! FAQs doesn't exist.";
						} else {
							while ($eachData=mysqli_fetch_array($getDataQuery)){
							$dataTitle=$eachData['title'];

							$dataDetails=html_entity_decode($eachData['details']);
							print "
							<div headerindex='0h' class='silverheader selected'><a href='#'>$dataTitle</a></div>
							<div style='display: block;' contentindex='0c' class='submenu'>
								$dataDetails <br>
							</div>
							";
							}
						}
			
			?>
		</div>
	</div>
</section>

<?php include 'footer.php';?>


