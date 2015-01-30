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
			 	var modalForm  = $('#js-modal-form'),
			 		subject    = $('#js-subject'),
					from       = $('#js-from');

				subject.val(subjectVal);
				from.val(fromVal);
		 	}
		 	function popupText(textVal){
					var modalForm = $('#js-modal-window'),
					    text      = $('#js-modal-window__container');

				text.empty().html(textVal);
		 	}
		 	
		 	//Add subject and from data to popup form
		 	$('#jsBtn-1').on('click', function() {
				popupValue(
					'Заказ звонка',
					'с шапки сайта'
				);
			});
			$('#jsBtn-2').on('click', function() {
				popupValue(
					'Заявка на замер',
					'с блока НАШИ ОКНА'
				);
			});
			$('#jsBtn-3').on('click', function() {
				popupValue(
					'Заявка на расчет стоимости',
					'с блока НАШИ ОКНА'
				);
			});
			$('#jsBtn-4').on('click', function() {
				popupValue(
					'Заказ на индивидуальный дизайн проект окна',
					'с блока доп услуги'
				);
			});
			$('#jsBtn-5').on('click', function() {
				popupValue(
					'Заявка на замер ',
					'с блока КАК МЫ РАБОТАЕМ'
				);
			});
			$('#jsBtn-6').on('click', function() {
				popupValue(
					'Заявка на расчет стоимости ',
					'с блока КАК МЫ РАБОТАЕМ'
				);
			});
			$('#jsBtn-7').on('click', function() {
				popupValue(
					'Заказ звонка ',
					'с блока над отзывами'
				);
			});

		 	//Add text to readmore popups
			$('#jsBtn-8').on('click', function() {
				popupText(
					''
				);
			});

	}); //popups
