/*-------------------------------------------------------*\
							Modal windows
\*-------------------------------------------------------*/
;

// Home page: http://dimsemenov.com/plugins/magnific-popup/

// Required plugins

// Initialization
	$(document).ready(function() {
        /* This script supports IE9+ */
            (function() {
                /* Opening modal window function */
                function openModal() {
                    /* Get trigger element */
                    var modalTrigger = document.getElementsByClassName('jsModalTrigger');

                    /* Set onclick event handler for all trigger elements */
                    for(var i = 0; i < modalTrigger.length; i++) {
                        modalTrigger[i].onclick = function() {
                            var target = this.getAttribute('data-target');
                            var modalWindow = document.getElementById(target);

                            modalWindow.classList ? modalWindow.classList.add('open') : modalWindow.className += ' ' + 'open';
                        }
                    }
                }

                function closeModal(){
                    /* Get close button */
                    var closeButton = document.getElementsByClassName('jsModalClose');
                    var closeOverlay = document.getElementsByClassName('jsOverlay');

                    /* Set onclick event handler for close buttons */
                    for(var i = 0; i < closeButton.length; i++) {
                        closeButton[i].onclick = function() {
                            var modalWindow = this.parentNode.parentNode;

                            modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
                        }
                    }

                    /* Set onclick event handler for modal overlay */
                    for(var i = 0; i < closeOverlay.length; i++) {
                        closeOverlay[i].onclick = function() {
                            var modalWindow = this.parentNode;

                            modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
                        }
                    }

                }

                /* Handling domready event IE9+ */
                function ready(fn) {
                    if (document.readyState != 'loading'){
                        fn();
                    } else {
                        document.addEventListener('DOMContentLoaded', fn);
                    }
                }

                /* Triggering modal window function after dom ready */
                ready(openModal);
                ready(closeModal);
            }());

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
