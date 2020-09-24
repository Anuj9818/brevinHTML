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
