<?php
require 'config.php';
require 'dbconnect.php';
require ('inc/function.php');
include 'head.php';
$selectedMenu="news";
include 'header.php';
include 'inc/notice-board.php';
?>

<div class="content-wrap">
	<div class="content">
		<div class="subpage">
			<h1>Photo Gallery</h1>
			<?php
				
				$id=intval($_GET["id"]);
				$page=intval($_GET["page"]);
				$linkedPage="gallery.php";
				
				if ($id=="0") {
					$getLatestGallery=mysqli_fetch_array(mysqli_query($con, "select * from gallery_name order by posted_date desc, id desc limit 1"));
					$id=$getLatestGallery['id'];
				}

				$getDataQuery=mysqli_query($con, "select * from gallery_name where id='$id'");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! Data doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataTitle=html_entity_decode($eachData['title']);
					$dataDetails=html_entity_decode($eachData['details']);
					$dataDate=date("M d, Y", strtotime($eachData['posted_date']));

					print "<h3>$dataTitle</h3>";
					print "<div class=\"txt\" style=\"padding:0 0 0 0px;\">Date: $dataDate</div>";
					print "<div class=\"txt\" style=\"padding:0 0 0 0px;\">$dataDetails</div>";

					print "<div style=\"margin-top: 0px;\">";
					$getPhotos=mysqli_query($con, "select * from gallery_image where gallery_id='$id' order by id desc");
					if (mysqli_num_rows($getPhotos)>0) {
						print "<ul class='gallery-list' style='list-style-type:none; margin:15px 0; padding:0px;'>";

						while ($eachPhotos=mysqli_fetch_array($getPhotos)) {
							$dataImg=$eachPhotos['img_name'];
							print "<li>
								<a href=\"$common_path/uploads/gallery/$dataImg\" data-lightbox='roadtrip' title=\"$dataTitle\"><img src='$common_path/uploads/gallery/$dataImg' width='140' border='0' alt='$title'></a>
							</li>";
						}
						print "</ul>";
					} else {
						print "<div class=\"txt\" style=\"padding: 20px; color: #d51818;\">Photos doesn't exist.</div>";
					}
					print "</div>";
				}
				?>

				<br class='clear'><br><br>

				<div class="txt" style="padding:0 0 10px 10px;">More Albums</div>

				<?php
				$limit=10;
				
				$query1="select * from gallery_name";
				$result1=mysqli_query($con, $query1);
				$totalrows=mysqli_num_rows($result1);

				if ($totalrows==0) {
					print "ERROR! Albums Doesn't Exist.";
				} else {
					if(empty($page)) {
						$page = 1; 
					}
					$limitvalue1 = $page*$limit-($limit);

					$getAlbumsQueryData=$query1." order by posted_date desc, id desc LIMIT $limitvalue1, $limit";
					$getAlbumsQuery=mysqli_query($con, $getAlbumsQueryData);

					while ($eachData=mysqli_fetch_array($getAlbumsQuery)) {
						$altRow++;
						$albumID=$eachData['id'];
						$albumTitle=html_entity_decode($eachData['title']);
						$albumDetails=html_entity_decode(stripslashes($eachData['details']));
						$albumShortDetails=substr(strip_tags($albumDetails), 0, 160);
						
						print "<div style=\"padding:0 0 0 10px;\">
							<a href=\"gallery.php?id=$albumID&page=$page\" class=\"seeDetailMenu\">$albumTitle</a>
							<div class=\"txt\">$albumShortDetails ...</div>
						</div>
						<hr class='thin'>";
					}

					$raw_pages=$totalrows/$limit;
					$int_pages=(integer) $raw_pages;
					if($raw_pages>$int_pages) {
						$numofpages=$int_pages+1;
					} else {
						$numofpages=$raw_pages;
					}
					if($page!=1) {
						$pageprev=$page-1;
						$prevCodeOutput="<li><a href=\"gallery.php?id=$albumID&page=$pageprev\" class=\"prevnext\">&laquo; Previous</a></li>\n";
					} else {
						$prevCodeOutput="<li><a href=\"#\" class=\"prevnext disablelink\">&laquo; Previous</a></li>\n";
					}

					$loopPage="";
					for($i=1; $i<=$numofpages; $i++) {
						$loopPage.="<li><a href=\"gallery.php?id=$albumID&page=$i\"";
						if ($page==$i) {
							$loopPage.="class=\"currentpage\"";
						}
						$loopPage.=">$i</a></li>\n";
					}

					if($page<$numofpages && $numofpages>1){
						$pagenext=$page+1;
						$nextCodeOutput="<li><a href=\"gallery.php?id=$albumID&page=$pagenext\" class=\"prevnext\">Next &raquo;</a></li>\n";
					} else {
						$nextCodeOutput="<li><a href=\"#\" class=\"prevnext disablelink\">Next &raquo;</a></li>\n";
					}

					print "<div class=\"pagination\">
						<ul>
							$prevCodeOutput
							$loopPage
							$nextCodeOutput
						</ul>
					</div>";
				}
				?>
		</div>
		<?php include 'sidebar.php'; ?>
		
		<div class="clear"></div>
	</div>
</div>

<?php
include 'footer.php';
?>