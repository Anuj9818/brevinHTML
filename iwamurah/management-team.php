<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
$selectedMenu="aboutus";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<h1>Management Team</h1>
				<div align="center"><CENTER>
				<?php							
						$result=mysqli_query($con, "select * from mprofile order by position asc");
						
						if (mysqli_num_rows($result)>0) {
							while ($eachData=mysqli_fetch_array($result)) {
								$i++;
								$dataName=$eachData['name'];
								$dataDesignation=$eachData['designation'];
								$dataDetails=$eachData['details'];
								$dataImg=$eachData['image'];
								print "<div class='bod'><img src='$common_path/uploads/mprofile/$dataImg' border='0' alt='$dataName'><br><br><strong>$dataName</strong><br>$dataDesignation</div>";
								
							}
						} else {
							print "<div class=\"txt\" style=\"padding: 20px; color: #d51818;\">Data doesn't exist.</div>";
						}
				?>
				</div><br class="clear">
		</div>
	</div>
</div>

<?php
require 'footer.php';
?>
