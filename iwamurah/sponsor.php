<?php
require 'config.php';
require 'dbconnect.php';
require 'inc/function.php';
require 'head.php';
$selectedMenu="sponsor";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<?php
				$id=intval($_GET["id"]);

				$getDataQuery=mysqli_query("select * from sponsor where id='$id'");								
				$eachData=mysqli_fetch_array($getDataQuery);
				$dataTitle=html_entity_decode($eachData['title']);
				$dataDetails=html_entity_decode($eachData['details']);
				print "<h1>$dataTitle</h1><p>$dataDetails</p>";
			?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php
require 'footer.php';
?>
