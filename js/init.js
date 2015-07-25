jQuery(document).ready(function($){
    
    $('.flexslider').flexslider({
    	animation: "slide",
    	directionNav: false,
    	controlNav: true
	});
  

	/* Fancybox */
		
		$(".fancybox, .maincontent a:has(img)").fancybox({
			transition: "fade",
		  helpers : {
		      media : {},
			   thumbs	: {
				width	: 70,
				height	: 50
			},
				title: {
	            type: 'over'
	        }

		  }
		});




});