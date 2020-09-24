<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>


<?php
$selectedMenu="news";
include 'header.php';
?>

<section id="header-about">
	<div class="container">
	<h1>Video Gallery</h1>
	</div>
</section>

<section id="subpage">
	<div class="container">
		<ul class="video">
		<?php
				$queryVideo = mysqli_query($con, "select * from video");
				while ($eachVideo = mysqli_fetch_array($queryVideo)){
					$dataTitle = html_entity_decode($eachVideo['title']);
					$dataUrl = $eachVideo['url'];
					$dataDetails = html_entity_decode($eachVideo['details']);

					print "<li>
				
			

		<object>
		  <param name='movie'
				 value='$dataUrl?version=3&autoplay=0&controls=0&rel=0'></param>
		  <param name='allowScriptAccess' value='always'></param>
		  <embed src='$dataUrl?version=3&autoplay=0&controls=0&rel=0'
				 type='application/x-shockwave-flash'
				 allowscriptaccess='always'
				 width='100%' height='100%'></embed>
		</object></li>";
		}
				 ?>
				 </ul><br><br>
				 <div class="clear"></div>
	</div>
</section>

<?php include 'footer.php';?>


