<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>


<?php
$selectedMenu="contact";
include 'header.php';
?>

<section id="subpage-wrap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.531850360102!2d85.34220121454497!3d27.7317371827818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1942cdeaaaab%3A0xdab29c02268a963!2sHimalayan+Climbing+%26+Mountaineering+School!5e0!3m2!1sen!2snp!4v1474351634015" width="100%" height="400" frameborder="0" style="border:0; background:#fff; margin-bottom:-30px;" allowfullscreen></iframe></section>


<section id="subpage">
	<div class="container">
		<?php
          $getDataQuery=mysqli_query($con, "select * from contactus");               
          if(mysqli_num_rows($getDataQuery)==0) {
            print "Error! Page doesn't exist.";
          } else {
            $eachData=mysqli_fetch_array($getDataQuery);
            $dataHomeDetails=html_entity_decode($eachData['details']);
            print "$dataHomeDetails";
          }
        ?>
	</div>
</section>


<?php include 'footer.php';?>


