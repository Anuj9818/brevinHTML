<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
$selectedMenu="healthServices";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<h1>Our Departments</h1>
			<?php
					$query = "select distinct department from doctors order by department asc";
					$result = mysqli_query($con, $query);

						print "<ul class='listings'>";
						while($each = mysqli_fetch_array($result)) {

							$dataID=$each['id'];;
							$dataDepartment=$each['department'];

							print "<li><a href='$common_path/doctors.php?department=$dataDepartment' class='department'>$dataDepartment</a></li>";

							
						}

						print "</ul>";
				
			?>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php
require 'footer.php';
?>
