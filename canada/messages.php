<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="aboutus";
include 'header.php';
?>

<section id="subpage-top">
	<div class="container">
		<?php
				$gotID = $_GET['id'];
	          $getDataQuery=mysqli_query($con, "select * from messages where id=$gotID");
	            $eachData=mysqli_fetch_array($getDataQuery);
	            $dataDesignation=html_entity_decode($eachData['designation']);
	            print "<h1>Message from $dataDesignation</h1>";
	        ?>
	</div>

</section>

<section id="subpage-wrap">
	<div class="container clearfix">
		<div id="subpage-full" class="clearfix post">
			<?php
				$gotID = $_GET['id'];
	          $getDataQuery=mysqli_query($con, "select * from messages where id=$gotID");               
	          if(mysqli_num_rows($getDataQuery)==0) {
	            print "Error! Data doesn't exist.";
	          } else {
	            $eachData=mysqli_fetch_array($getDataQuery);
	            $dataName=$eachData['title'];
	            $dataImage=$eachData['image'];
	            $dataDetails=html_entity_decode($eachData['details']);
	            print "<img src='$common_path/uploads/messages/$dataImage' alt='' class='sub-img'><p>$dataDetails</p><br><br><p><strong>$dataName</strong><br>$dataDesignation</p>";
	          }
	        ?>
			
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>



