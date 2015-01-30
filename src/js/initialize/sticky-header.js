/*-------------------------------------------------------*\
 Sticky header
 \*-------------------------------------------------------*/
;

// Home page: none

// Initialization
$(document).ready(function() {
	/*
	 * Sticky header
	 */
	$(window).scroll(function(){
		if( $(this).scrollTop() > 200 ){
			$('.header').addClass('header--sticky');
		}else{
			$('.header').removeClass('header--sticky');
		}
	});
}); //scroll to