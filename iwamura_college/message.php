<?php
require 'config.php';
require 'dbconnect.php';
include 'head.php';
$selectedMenu="home";
include 'header.php';
include 'inc/notice-board.php';
?>

<div class="content-wrap">
	<div class="content">
		<div class="subpage">
			<?php
				$gotID = $_GET['id'];
				$getDataQuery=mysqli_query($con, "select * from message where id='$gotID'");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Page doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataName=$eachData['name'];
					$dataDesignation=$eachData['designation'];
					$dataName=$eachData['name'];
					$dataImg=$eachData['image'];
					$dataDetails=html_entity_decode($eachData['details']);
					print "<h1>Message from $dataDesignation</h1><img src='$common_path/uploads/message/$dataImg' border='0' alt='$dataName' style='float:left; margin:0 20px 0 0;'><p style='float:right;'>$dataDetails<br>$dataName<br>$dataDesignation</p>";
				}

			?>
		</div>
		<?php include 'sidebar.php'; ?>
		
		<div class="clear"></div>
	</div>
</div>

<?php
include 'footer.php';
?>