<?php
require 'config.php';
require 'dbconnect.php';

include 'head.php';
$selectedMenu="blog";
include 'header.php';
?>

<section id="subpage-top">
	<div class="container">
		<h1>BLOG</h1>
	</div>

</section>

<section id="subpage-wrap">
	<div class="container clearfix">
		<div id="subpage-full" class="clearfix post">
			
			<?php
			$id=intval($_GET["id"]);
			
			if ($id > 0) {

				$getDataQuery=mysqli_query($con, "select * from blog where id='$id'");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! News doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataTitle=html_entity_decode($eachData['title']);
					$dataAddedDate=$eachData['posted_date'];
					$dataImg=$eachData['image'];
					$dataDetails=html_entity_decode($eachData['details']);
					print "<h2>$dataTitle</h2><br><img src='$common_path/uploads/blog/$dataImg' class='sub-img'>
						<h4>Posted: $dataAddedDate</h4><br>
						$dataDetails";
				}

			} else {

				$query = "select * from blog order by posted_date desc";
				$result = mysqli_query($con, $query);
				$totalrows = mysqli_num_rows($result);
				if ($totalrows == 0) {
					print "Sorry! No Data Exist";
				} else {

					print "<ul class='news-listing'>";

					$rpp = 5; // results per page
					$adjacents = 8;

					$page = intval($_GET["page"]);
					if(!$page) $page = 1;

					$reload = "blog.php?";

					// select appropriate results from DB:
					$result = mysqli_query($con, $query);

					// count total number of appropriate listings:
					$tcount = mysqli_num_rows($result);

					// count number of pages:
					$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

					$count = 0;
					$i = ($page-1)*$rpp;
					while(($count<$rpp) && ($i<$tcount)) {

						mysqli_data_seek($result,$i);
						$query = mysqli_fetch_array($result);

						$i++;
						$count++;

						$dataID=$query['id'];
						$dataTitle=html_entity_decode($query['title']);
						$dataAddedDate=$query['posted_date'];
						$dataImg=$query['image'];
						$dataDetails=html_entity_decode($query['details']);

						$dataShortDetails=substr(strip_tags($dataDetails), 0, 200);

						print "<li><img src='$common_path/uploads/blog/$dataImg' class='sub-img' style='max-width:150px;'>
							<a href='$common_path/blog.php?id=$dataID' class='titleMenu'>$dataTitle</a>
							<p>Posted: $dataAddedDate<br>
							
								$dataShortDetails ...
								<a href='$common_path/blog.php?id=$dataID' class='underline'>read more</a>
							</p><br>
						</li>";

						
					}

					print "</ul><br>";

					print pagination($reload, $page, $tpages, $adjacents);
					// pagination php code is on inc/function.php
					// pagination css code is on css/pagination.css
				}
			}
		?>
				<div class="clear"></div>
		</div>
	</div>
</section>

<?php
include 'footer.php';
?>



