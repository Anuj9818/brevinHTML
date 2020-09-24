<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="language";
include 'header.php';
?>

<section id="subpage-top">
	<div class="container">
		<?php
				$gotID = $_GET['id'];
	          $getDataQuery=mysqli_query($con, "select * from language_class where id=$gotID");
	            $eachData=mysqli_fetch_array($getDataQuery);
	            $dataTitle=html_entity_decode($eachData['title']);
	            print "<h1>$dataTitle</h1>";
	        ?>
	</div>
</section>

<section id="subpage-wrap">
	<div class="container clearfix">
		<div id="subpage-full" class="post">
			<?php
				$gotID = $_GET['id'];
	          $getDataQuery=mysqli_query($con, "select * from language_class where id=$gotID");               
	          if(mysqli_num_rows($getDataQuery)==0) {
	            print "Error! Data doesn't exist.";
	          } else {
	            $eachData=mysqli_fetch_array($getDataQuery);
	            $dataImage=$eachData['image'];
	            $dataDetails=html_entity_decode($eachData['details']);
	            if ($dataImage!=""){
	            	print"<img src='$common_path/uploads/language-class/$dataImage' alt=''><br><br>";
	            }
	            print "<p>$dataDetails</p>";
	          }
	        ?>
			
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>



