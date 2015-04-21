/*-------------------------------------------------------*\
						Scroll to
\*-------------------------------------------------------*/
;

// Home page: none

// Initialization
	$(document).ready(function() {
		/*
		 * Scroll top
		 */
			// Fade in scroll-up btn
			$(window).scroll(function(){
				if( $(this).scrollTop() > 200 ){
					$('#jsScrollTop').fadeIn();
				}else{
					$('#jsScrollTop').fadeOut();
				}
			});
			//Scroll to top
			$('#jsScrollTop').click(function(){
				$('body,html').animate({
					scrollTop:0
				},
				400
				);
				return false;
			});



	}); //scroll to