<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="aboutus";
include 'header.php';
?>

<section id="subpage-top">
	<div class="container">
		<h1>Testimonials</h1>
	</div>
</section>

<section id="subpage-wrap">
	<div class="container clearfix">
		<div id="subpage-full" class="post">
			<?php
		        $getDataQuery=mysqli_query($con, "select * from testimonials order by position asc");               
		          while ($eachData=mysqli_fetch_array($getDataQuery)) {
		            $dataName=$eachData['name'];
		            $dataDestination=$eachData['destination'];
		            $dataImage=$eachData['image'];
		            $dataDetails=html_entity_decode($eachData['details']);
		            if ($dataImage!=""){
		            	print"<img src='$common_path/uploads/testimonials/$dataImage' alt='' style='float:left; margin:0 30px 30px 0;'>";
		            }
		            print "<p><strong>$dataName</strong><br>$dataDestination<br><br>$dataDetails</p><br class='clear'><br><hr><br><br>";
		          }
		        ?>
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>



