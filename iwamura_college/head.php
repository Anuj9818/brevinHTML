<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="Author" content="Emerge Creation">
<meta name="Keywords" content="">
<meta name="Description" content="">
<title>Iwamura College of Health Science - Sallaghari, Bhaktapur, Nepal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo $common_path;?>/style.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Roboto:700,400' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $common_path; ?>/inc/pagination.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $common_path; ?>/inc/paginate.css">

<!-- scrolltopcontrol starts -->
	<script type="text/javascript" src="<?php echo $common_path;?>/assets/scrolltopcontrol/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $common_path;?>/assets/scrolltopcontrol/scrolltopcontrol.js">
	/***********************************************
	* Scroll To Top Control script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
	* This notice MUST stay intact for legal use
	* Visit Project Page at http://www.dynamicdrive.com for full source code
	***********************************************/
	</script>
	<!-- scrolltopcontrol ends -->


  <script src="<?php print $common_path;?>/assets/lightbox/jquery-1.10.2.min.js"></script>
  <script src="<?php print $common_path;?>/assets/lightbox/lightbox-2.6.min.js"></script>
  <link href="<?php print $common_path;?>/assets/lightbox/lightbox.css" rel="stylesheet" />

<link href="<?php echo $common_path;?>/assets/boot/bootstrap-3.1.1.min.css" rel="stylesheet" type="text/css">
<!-------------------- JS -------------------->
<script type="text/javascript" src="<?php echo $common_path;?>/assets/boot/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $common_path;?>/assets/boot/bootstrap-3.1.1.min.js"></script>

<!-- Owl Carousel Assets -->
<link href="<?php print $common_path;?>/assets/owl-carousel/owl.carousel.css" rel="stylesheet">
<script src="<?php print $common_path;?>/assets/owl-carousel/jquery-1.9.1.min.js"></script> 
<script src="<?php print $common_path;?>/assets/owl-carousel/owl.carousel.js"></script>


<!-- Demo -->

<style>
#owl-demo .item img{
  display: block;
  width: 100%;
  height: auto;
}
#bar{
  width: 0%;
  max-width: 100%;
  height: 0px;
  background: #c42929;
}
#progressBar{
  width: 100%;
  background: #f4f3eb;
}
</style>


<script>
$(document).ready(function() {

  var time = 10; // time in seconds

  var $progressBar,
	  $bar, 
	  $elem, 
	  isPause, 
	  tick,
	  percentTime;

	//Init the carousel
	$("#owl-demo").owlCarousel({
	  slideSpeed : 800,
	  paginationSpeed : 1800,
	  singleItem : true,
	  afterInit : progressBar,
	  afterMove : moved
	  //startDragging : pauseOnDragging
	});

	//Init progressBar where elem is $("#owl-demo")
	function progressBar(elem){
	  $elem = elem;
	  //build progress bar elements
	  buildProgressBar();
	  //start counting
	  start();
	}

	//create div#progressBar and div#bar then prepend to $("#owl-demo")
	function buildProgressBar(){
	  $progressBar = $("<div>",{
		id:"progressBar"
	  });
	  $bar = $("<div>",{
		id:"bar"
	  });
	  $progressBar.append($bar).prependTo($elem);
	}

	function start() {
	  //reset timer
	  percentTime = 0;
	  isPause = false;
	  //run interval every 0.01 second
	  tick = setInterval(interval, 10);
	};

	function interval() {
	  if(isPause === false){
		percentTime += 1 / time;
		$bar.css({
		   width: percentTime+"%"
		 });
		//if percentTime is equal or greater than 100
		if(percentTime >= 100){
		  //slide to next item 
		  $elem.trigger('owl.next')
		}
	  }
	}

	//pause while dragging 
	function pauseOnDragging(){
	  isPause = true;
	}

	//moved callback
	function moved(){
	  //clear interval
	  clearTimeout(tick);
	  //start again
	  start();
	}

	//uncomment this to make pause on mouseover 
	// $elem.on('mouseover',function(){
	//   isPause = true;
	// })
	// $elem.on('mouseout',function(){
	//   isPause = false;
	// })
});
</script>

<script type="text/javascript" src="<?php print"$common_path/assets/popup/popup.js"; ?>"></script>
<link href="<?php print $common_path;?>/assets/popup/popup.css" rel="stylesheet" type="text/css">

</head>
<body>