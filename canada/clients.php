<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="aboutus";
include 'header.php';
?>

<section id="subpage-top">
	<div class="container">
		<h1>Colleges/Universities</h1>
	</div>

</section>

<section id="subpage-wrap">
	<div class="container clearfix">
		<div id="subpage-full" class="post">
			<ul class="associates">
			<?php	
				$result=mysqli_query($con, "select * from clients order by position asc");
				while ($eachData=mysqli_fetch_array($result)){
						$dataID=$eachData['id'];
						$dataTitle=$eachData['title'];
						$dataLink=$eachData['link'];
						$dataImg=$eachData['image'];
						print "<li><a href='$dataLink'><img src='$common_path/uploads/clients/$dataImg' border='0' alt='$dataTitle' title='$dataTitle'></a></li>";	
					};
			?>
		</ul>
		<div class="clear"></div>
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>



