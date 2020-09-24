<div class="notice-board-wrap">
	<div class="notice-board">
		<h1>Notice Board:</h1>
		<?php
			$result=mysqli_query($con, "select * from notice order by id desc limit 1");
			while ($each_row=mysqli_fetch_array($result)){
				$dataID=$each_row['id'];
				$dataTitle=$each_row['title'];
				$dataDate=date("M d, Y", strtotime($each_row['added_date']));
				print "<p>$dataDate -</p><p><a href='$common_path/notice.php?id=$dataID'>$dataTitle</a></p>";				
			}
		?>
		
		<div class="clear"></div>
	</div>
</div>