var $s = jQuery.noConflict();
    $s(document).ready(function() {
 
	  
 $s("#owl-demo").owlCarousel({
        navigation: true,    
        autoPlay: 3000, //Set AutoPlay to 3 seconds     
		items : 1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [979,1],
		 itemsTablet : [768, 1],
		itemsMobile : [479,1],
		touchDrag               : true,
		mouseDrag               : true,
 

      });
 

	  $s("#owl-demo2").owlCarousel({  
navigation: true,    
        autoPlay: 3000, //Set AutoPlay to 3 seconds     
		items : 4,
		itemsDesktop : [1199,4],
		itemsDesktopSmall : [979,4],
		itemsTablet : [768, 3],
		itemsMobile : [479,1],
		touchDrag               : true,
		mouseDrag               : true,
 

      });
 
	  
	 	  $s("#owl-demo3").owlCarousel({  
navigation: true,    
        autoPlay: 3000, //Set AutoPlay to 3 seconds     
		items : 2,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [979,2],
		itemsTablet : [768, 2],
		itemsMobile : [479,1],
		touchDrag               : true,
		mouseDrag               : true,
 

      });
  
		$s("#owl-demo4").owlCarousel({  
		navigation: true,    
        autoPlay: 3000, //Set AutoPlay to 3 seconds     
		items : 7,
		itemsDesktop : [1199,5],
		itemsDesktopSmall : [979,4],
		itemsTablet : [768, 3],
		itemsMobile : [479,2],
		touchDrag               : true,
		mouseDrag               : true,
 

      });  

    });