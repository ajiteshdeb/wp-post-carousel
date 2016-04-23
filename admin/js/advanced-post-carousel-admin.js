(function( $ ) {
	'use strict';


	 $(function() {
	 	// tabs
		var $carouseltabBoxes = $('.carousel-settings-tab'),
		       $carouseltabLinkActive,
		       $carouselcurrentTab,
		       $carouselcurrentTabLink,
		       $carouseltabContent,
		       $hash;



		// Tabs on load
	 	if(window.location.hash){
	 		$hash = window.location.hash;
	 		$carouseltabBoxes.addClass('hidden');
			$carouselcurrentTab = $($hash).toggleClass('hidden');
			$('.nav-tab').removeClass('nav-tab-active');
			$('.nav-tab[href='+$hash+']').addClass('nav-tab-active');
	 	}
	 	//Tabs on click
	 	$('.nav-tab-wrapper').on('click', 'a', function(e){
			e.preventDefault();
			$carouseltabContent = $(this).attr('href');
			$('.nav-tab').removeClass('nav-tab-active');
			$carouseltabBoxes.addClass('hidden');
			$carouselcurrentTab = $($carouseltabContent).toggleClass('hidden');
			$(this).addClass('nav-tab-active');
			 if(history.pushState) {
				history.pushState(null, null, $carouseltabContent);
			}
			else {
				location.hash = $carouseltabContent;
            }
		})

	 	

            

	});

})( jQuery );
