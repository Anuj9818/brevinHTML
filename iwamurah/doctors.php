<?php
require 'config.php';
require 'dbconnect.php';
require 'head.php';
$selectedMenu="doctors";
require 'header.php';
?>

<div id="subpage-border">
	<div id="subpage-wrap">
		<div class="subpage">
		
			<?php
				$gotDepartment = $_GET['department'];
					$query = "select * from doctors where department='$gotDepartment' order by position asc";
					$result = mysqli_query($con, $query);

						print "<h1>$gotDepartment</h1>";
						while($each = mysqli_fetch_array($result)) {

							$dataID=$each['id'];
							$dataName=$each['name'];
							$dataDepartment=$each['department'];
							$dataDesignation=$each['designation'];
							$dataQualification=$each['qualification'];
							$dataLicense=$each['license'];
							$dataImg=$each['image'];

							if ($dataImg==""){
								print "<div class='bod'><img src='$common_path/images/img_doc.jpg' width='160px' border='0' alt='$dataName'><br><br><strong>$dataName</strong><br>$dataDesignation<br>$dataQualification<br>NMC No.: $dataLicense</div>";
							} else{
								print "<div class='bod'><img src='$common_path/uploads/doctors/$dataImg' border='0' alt='$dataName'><br><br><strong>$dataName</strong><br>$dataDesignation<br>$dataQualification<br>NMC No.: $dataLicense</div>";
							}

							
							
						}
				
			?>
			<br class="clear"><br><br>
		</div>
	</div>
</div>

<?php
require 'footer.php';
?>
