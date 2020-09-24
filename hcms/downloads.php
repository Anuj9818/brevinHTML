<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
?>


<?php
$selectedMenu="about";
include 'header.php';
?>

<section id="header-about">
	<div class="container">
		<h1>Downloads</h1>
	</div>
</section>

<section id="subpage">
	<div class="container">
		<?php
		$loopi=0;
		$result = mysqli_query($con, "select * from downloads order by id desc");
		while ($each=mysqli_fetch_array($result)){
			$loopi++;
			$dataTitle = $each['title'];
			$dataFilename = $each['filename'];
			print "<article class='clearfix'><p>$loopi. <b>$dataTitle</b> - <a href='$common_path/uploads/downloads/$dataFilename'>Download</a></p><br></article>";
		}
		?>
		<div class="clear"></div>
	</div>
</section>

<?php include 'footer.php';?>


