<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="aboutus";
include 'header.php';
?>

<section id="subpage-top">
	<div class="container">
		<h1>Our Team</h1>
	</div>
</section>

<section id="subpage-wrap">
	<div class="container clearfix">
		<div id="subpage-full" class="post">
			<?php
				$query="select * from our_team order by position asc";
				$result=mysqli_query($con, $query);
				while ($each=mysqli_fetch_array($result)) {
					$dataName=$each['name'];
					$dataDesignation=$each['designation'];
					$dataImg=$each['image'];
					print "<div class='team_list'><h3>$dataName</h3><h4>$dataDesignation</h4><img src='$common_path/uploads/our_team/$dataImg' alt='$dataName'></div>";
				}
				?>
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>



