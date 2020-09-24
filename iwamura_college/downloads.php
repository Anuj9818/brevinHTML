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
			<h1>Downloads</h1>
			<table width="100%" cellpadding="5" cellspacing="1" class="txt">
				<?php
					$getLatestReport=mysqli_query($con, "select * from downloads order by id desc");
					if (mysqli_num_rows($getLatestReport)==0) {
						print "No Download Available.";
					} else {
						print "<tr style=\"background:#0062a0; font-weight:bold; color:#ffffff;\"><td width=\"40%\">Description</td><td width=\"40%\"> Download</td></tr>";
						while ($eachLatestReport=mysqli_fetch_array($getLatestReport)) {
							$latestReportTitle=html_entity_decode($eachLatestReport['title']);
							$latestReportFileName=$eachLatestReport['filename'];
							$latestReportDate=$eachLatestReport['date'];
							print "<tr><td style=\"background:#f2f2f2;\"><b>$latestReportTitle</b></td><td style=\"background:#f2f2f2;\"><a href=\"$common_path/uploads/downloads/$latestReportFileName\" class=\"underline\" target=\"_blank\">Click Here to Download</a></td></tr>";
						}
						print "";
					}
				?>
			</table>
			<br class="clear">
		</div>
		<?php include 'sidebar.php'; ?>
		
		<div class="clear"></div>
	</div>
</div>

<?php
include 'footer.php';
?>