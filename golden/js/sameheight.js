// JavaScript Document

 

	function setStableHeight(element) {

		var items = jQuery(element);

			var biggestHeight = 0;

			items.each(function() {

				if( biggestHeight < jQuery(this).height()) {
					biggestHeight = jQuery(this).height();
				}
				
			});

			items.each(function() {

				jQuery(this).css('height', biggestHeight + 'px');
			});
	}


	jQuery(function  () {
		setStableHeight('.sameheight')

	})
 
		function setStableHeight(element) {

		var items = jQuery(element);

			var biggestHeight = 0;

			items.each(function() {

				if( biggestHeight < jQuery(this).height()) {
					biggestHeight = jQuery(this).height();
				}
				
			});

			items.each(function() {

				jQuery(this).css('height', biggestHeight + 'px');
			});
	}


	jQuery(function  () {
		setStableHeight('.sameheight2')

	})
	
	
	
			function setStableHeight(element) {

		var items = jQuery(element);

			var biggestHeight = 0;

			items.each(function() {

				if( biggestHeight < jQuery(this).height()) {
					biggestHeight = jQuery(this).height();
				}
				
			});

			items.each(function() {

				jQuery(this).css('height', biggestHeight + 'px');
			});
	}


	jQuery(function  () {
		setStableHeight('.sameheight3')

	})
	
	
	
	
	
 