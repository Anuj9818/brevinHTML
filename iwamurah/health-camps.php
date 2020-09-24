<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
$selectedMenu="healthCamps";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
			<?php
				$id=intval($_GET["id"]);
				
				if ($id > 0) {

					$getDataQuery=mysqli_query($con, "select * from health_camps where id='$id'");								
					if(mysqli_num_rows($getDataQuery)==0) {
						print "Error! News doesn't exist.";
					} else {
						$eachData=mysqli_fetch_array($getDataQuery);
						$dataTitle=html_entity_decode($eachData['title']);
						$dataDetails=html_entity_decode($eachData['details']);
						print "<h1>$dataTitle</h1>
							$dataDetails";
					}

				} else {

					$query = "select * from health_camps order by id desc";
					$result = mysqli_query($con, $query);
					$totalrows = mysqli_num_rows($result);
					if ($totalrows == 0) {
						print "Sorry! No Data Exist";
					} else {

						print "<h1>Health Camps</h1><ul class='listings'>";

						$rpp = 5; // results per page
						$adjacents = 8;

						$page = intval($_GET["page"]);
						if(!$page) $page = 1;

						$reload = "health-camps.php?";

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
							$dataDetails=html_entity_decode($query['details']);

							$dataShortDetails=substr(strip_tags($dataDetails), 0, 160);

							print "<li><a href='$common_path/health-camps.php?id=$dataID'>$dataTitle</a>
								$dataShortDetails ... <a href='$common_path/health-camps.php?id=$dataID'>read more</a></li>";

							
						}

						print "</ul>";

						print pagination($reload, $page, $tpages, $adjacents);
						// pagination php code is on inc/function.php
						// pagination css code is on css/pagination.css
					}
				}
			?>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php
require 'footer.php';
?>
