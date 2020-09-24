<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="Author" content="Emerge Creations">
<meta name="Keywords" content="">
<meta name="Description" content="">
<title>Dr Iwamura Memorial Hospital and Research Center - Sallaghari, Bhaktapur</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="/style.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" media="screen" href="inc/pagination.css">
<link rel="stylesheet" type="text/css" media="screen" href="inc/paginate.css">

<!-- scrolltopcontrol starts -->
	<script type="text/javascript" src="assets/scrolltopcontrol/jquery.min.js"></script>
	<script type="text/javascript" src="assets/scrolltopcontrol/scrolltopcontrol.js">
	/***********************************************
	* Scroll To Top Control script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
	* This notice MUST stay intact for legal use
	* Visit Project Page at http://www.dynamicdrive.com for full source code
	***********************************************/
	</script>
	<!-- scrolltopcontrol ends -->

	<link href="assets/phoenix/phoenix.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


  <script src="assets/lightbox/jquery-1.10.2.min.js"></script>
  <script src="assets/lightbox/lightbox-2.6.min.js"></script>
  <link href="assets/lightbox/lightbox.css" rel="stylesheet" />


<link rel="stylesheet" type="text/css" href="assets/nav/nav.css">

<!-- Owl Carousel Assets -->
<link href="assets/owl-carousel/owl.carousel.css" rel="stylesheet">
<script src="assets/owl-carousel/owl.carousel.js"></script>

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
  height: 2px;
  background: #0fb3e8;
}

#progressBar{
  width: 100%;
  background: #ffbe05;
}

</style>

<script>
$(document).ready(function() {
		  var owl = $("#owl-demo");
		  owl.owlCarousel({
			  items : 1, //10 items above 1000px browser width
			  autoPlay: true,
			  itemsDesktop : [1140,1], //5 items between 1000px and 901px
			  itemsDesktopSmall : [1000,1], // betweem 900px and 601px
			  itemsTablet: [768,1], //2 items between 600 and 0
			  itemsMobile : [515,1] // itemsMobile disabled - inherit from itemsTablet option
		  });

		  // Custom Navigation Events

		  $(".next").click(function(){
			owl.trigger('owl.next');
		  })

		  $(".prev").click(function(){
			owl.trigger('owl.prev');
		  })

		  $(".play").click(function(){
			owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
		  })

		  $(".stop").click(function(){
			owl.trigger('owl.stop');
		  })

		});



		$(document).ready(function() {
		  $("#owl-demo1").owlCarousel({
			  navigation : false, // Show next and prev buttons
			  autoPlay : 5000,
			  paginationSpeed : 400,
			  singleItem:false,

			  // "singleItem:true" is a shortcut for:
			  items : 3, 
			  itemsDesktop : [1140,3],
			  itemsDesktopSmall : [1000,3],
			  itemsTablet: [768,3],
			  itemsMobile : [515,1]

		  });
		});

		$(document).ready(function() {

		  $("#owl-demo2").owlCarousel({

			  navigation : false, // Show next and prev buttons
			  autoPlay : 5000,
			  paginationSpeed : 400,
			  singleItem:false,

			  // "singleItem:true" is a shortcut for:
			  items : 4, 
			  itemsDesktop : [1140,4],
			  itemsDesktopSmall : [1000,4],
			  itemsTablet: [768,2],
			  itemsMobile : [515,1]
		  });

		  });

		  $(document).ready(function() {

		  $("#owl-demo3").owlCarousel({

			  navigation : false, // Show next and prev buttons
			  autoPlay : 5000,
			  paginationSpeed : 400,
			  singleItem:false,

			  // "singleItem:true" is a shortcut for:
			  items : 3,
			  itemsDesktop : [1140,3],
			  itemsDesktopSmall : [1000,3],
			  itemsTablet: [768,2],
			  itemsMobile : [515,1]

		  });

		});

		$(document).ready(function() {

		  $("#owl-demo4").owlCarousel({

			  navigation : false, // Show next and prev buttons
			  autoPlay : 5000,
			  paginationSpeed : 400,
			  singleItem:false,

			  // "singleItem:true" is a shortcut for:
			  items : 4, 
			  itemsDesktop : [1140,4],
			  itemsDesktopSmall : [1000,4],
			  itemsTablet: [768,4],
			  itemsMobile : [515,2]
		  });
		});
</script>

<script type="text/javascript" src="assets/popup/popup.js"; ?>"></script>
<link href="assets/popup/popup.css" rel="stylesheet" type="text/css">

</head>
<body>