<div class="right">
	<div class="news-home">
		<h1>Latest News</h1>
		<ul>
			<?php
				$result=mysqli_query($con, "select * from news order by id desc limit 3");
				while ($each_row=mysqli_fetch_array($result)){
					$dataID=$each_row['id'];
					$dataTitle=$each_row['title'];
					$dataAddedDate=$each_row['added_date'];
					print "<li>$dataAddedDate<br><a href='$common_path/news.php?id=$dataID'>$dataTitle</a></li>";				
				}
			?>
			<li><a href="<?php echo $common_path;?>/news">view all</a></li>
		</ul>
	</div>
</div>