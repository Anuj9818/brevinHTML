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
	<h1>Useful Links</h1>
	</div>
</section>

<section id="subpage">
	<div class="container">
		<?php
					$loopi=0;
					$result=mysqli_query($con, "select * from usefull_links order by position asc");
									
						while ($eachData=mysqli_fetch_array($result)) {
						$loopi++;
						$dataTitle=$eachData['title'];
						$dataWebsite=$eachData['website'];
						print "<article class='clearfix'><p>$loopi <b>$dataTitle</b> - <a href='$dataWebsite' target='_blank'>$dataWebsite</a></p><br></article>";
						
					}
			?>
		<div class="clear"></div>
	</div>
</section>

<?php include 'footer.php';?>


