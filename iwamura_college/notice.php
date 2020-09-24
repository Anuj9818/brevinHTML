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
			<h1>Notice Board</h1>
			<?php
			$id=intval($_GET["id"]);
			
			if ($id > 0) {

				$getDataQuery=mysqli_query($con, "select * from notice where id='$id'");								
				if(mysqli_num_rows($getDataQuery)==0) {
					print "Error! News doesn't exist.";
				} else {
					$eachData=mysqli_fetch_array($getDataQuery);
					$dataTitle=html_entity_decode($eachData['title']);
					$dataDate=date("M d, Y", strtotime($eachData['added_date']));
					$dataDetails=html_entity_decode($eachData['details']);
					print "<h2>$dataTitle</h2>
						<h4>Posted: $dataDate</h4><br><br>
						$dataDetails";
				}

			} else {

				$query = "select * from notice order by id desc";
				$result = mysqli_query($con, $query);
				$totalrows = mysqli_num_rows($result);
				if ($totalrows == 0) {
					print "Sorry! No Data Exist";
				} else {

					print "<ul>";

					$rpp = 5; // results per page
					$adjacents = 8;

					$page = intval($_GET["page"]);
					if(!$page) $page = 1;

					$reload = "notice.php?";

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
						$dataDate=date("M d, Y", strtotime($query['added_date']));
						$dataDetails=html_entity_decode($query['details']);

						$dataShortDetails=substr(strip_tags($dataDetails), 0, 160);

						print "<li>
							<a href='$common_path/notice.php?id=$dataID' class='titleMenu'>$dataTitle</a>
							<p>Posted: $dataDate<br>
							
								$dataShortDetails ...
								<a href='$common_path/notice.php?id=$dataID' class='underline'>read more</a>
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
		<?php include 'sidebar.php'; ?>
		
		<div class="clear"></div>
	</div>
</div>

<?php
include 'footer.php';
?>