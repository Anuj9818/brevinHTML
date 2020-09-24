<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="contactus";
include 'header.php';
?>

<section id="subpage-full">
	<div class="container">

		<?php

          $getDataQuery=mysqli_query($con, "select * from contactus");               
          if(mysqli_num_rows($getDataQuery)==0) {
            print "Error! Page doesn't exist.";
          } else {
            $eachData=mysqli_fetch_array($getDataQuery);
            $dataHomeDetails=html_entity_decode($eachData['details']);
            print "<center>$dataHomeDetails</center>";
          }
        ?>
	</div>
</section>

<section id="subpage-wrap">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.343842373706!2d85.32075625026204!3d27.706668082707743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1907ebef6081%3A0x1f03a58ad3e6c334!2sCAN+Consulting+Service!5e0!3m2!1sen!2snp!4v1520858931209" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

<?php
include 'footer.php';
?>



