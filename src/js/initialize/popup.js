/*-------------------------------------------------------*\
							Modal windows
\*-------------------------------------------------------*/
;

// Home page: http://dimsemenov.com/plugins/magnific-popup/

// Required plugins
	require('../plugins/jquery.magnific-popup.js');

// Initialization
	$(document).ready(function() {
		/**************************************
		 * MagnificPopup Initialize
		 */
			$('.popup').magnificPopup({
				type: 'inline',

				fixedContentPos: true,
				fixedBgPos: true,

				overflowY: 'auto',

				closeBtnInside: true,
				preloader: false,
				
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		/**************************************
		 * Changing modal window values
		 */
			function popupValue(subjectVal, fromVal){
			 	var modalForm  = $('#jsModalForm'),
			 		subject    = $('#jsSubject'),
					from       = $('#jsFrom');

				subject.val(subjectVal);
				from.val(fromVal);
		 	}
		 	function popupText(textVal){
					var modalForm = $('#jsModalWindow'),
					    text      = $('#jsModalWindowContainer');

				text.empty().html(textVal);
		 	}
		 	
		 	//Add subject and from data to popup form


		 	//Add text to readmore popups


	}); //popups
