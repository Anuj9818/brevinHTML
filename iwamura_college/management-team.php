<?php
require 'config.php';
require 'dbconnect.php';
include 'head.php';
$selectedMenu="aboutus";
include 'header.php';
include 'inc/notice-board.php';
?>

<div class="content-wrap">
	<div class="content">
		<div class="subpage">
			<h1>Management Team</h1>
				<div align="center"><CENTER>
				<?php							
						$result=mysqli_query($con, "select * from mprofile order by position asc");
						
						if (mysqli_num_rows($result)>0) {
							print "<ul class='bod'>";
							while ($eachData=mysqli_fetch_array($result)) {
								$i++;
								$dataName=$eachData['name'];
								$dataDesignation=$eachData['designation'];
								$dataDetails=$eachData['details'];
								$dataImg=$eachData['image'];
								print "
								<li><img src='$common_path/uploads/mprofile/$dataImg' width='100' border='0' alt='$dataName'><br><br><strong>$dataName</strong><br>$dataDesignation
								</li>";
								
							}
							print "</ul><br><br>";
						} else {
							print "<div class=\"txt\" style=\"padding: 20px; color: #d51818;\">Data doesn't exist.</div>";
						}
				?>
				</div><br class="clear">
		</div>
		<?php include 'sidebar.php'; ?>
		
		<div class="clear"></div>
	</div>
</div>

<?php
include 'footer.php';
?>