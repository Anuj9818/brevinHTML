<div class="right">
	<div class="news">
		<h1>Recent News</h1>
		<ul>
			<?php
				$loopi=0;
				$result=mysqli_query($con, "select * from news order by id desc limit 3");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=html_entity_decode($each_row['title']);
					$dataDate=html_entity_decode($each_row['added_date']);
					print "<li><a href=\"$common_path/news.php?id=$dataID\">$dataTitle</a><br><span>$dataDate</span></li>";
				}
			?>
			<li><a href="<?php echo $common_path ;?>/news-recent.php">view all</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	
</div>