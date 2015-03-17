/*-------------------------------------------------------*\
							Modal windows
\*-------------------------------------------------------*/
;

// Home page: http://dimsemenov.com/plugins/magnific-popup/

// Required plugins

//My jQuery popup plugin
(function ( $ ) {
    'use strict';

    $.fn.popup = function () {

        var trigger     = $(this);
        var target      = $('#' + trigger.data('target') );
        var overlay     = target.find('.jsModalOverlay');
        var closeBtn    = target.find('.jsModalClose');
        var title       = $('#jsModalTitle');
        var subtitle    = $('#jsModalSubtitle');
        var text        = $('#jsModalText');
        var subject     = $('#jsModalSubject');
        var from        = $('#jsModalFrom');
        var btn         = $('#jsModalBtn');
        var titleVal    = trigger.data('title');
        var subtitleVal = trigger.data('subtitle');
        var textVal     = trigger.data('text');
        var subjectVal  = trigger.data('subject');
        var fromVal     = trigger.data('from');
        var btnVal      = trigger.data('btn');


        function _setValue(element, value){
            element.val(value);
        }

        function _setText(element, text){
            element.text(text);
        }

        function _close() {
            target.removeClass('open');
        }

        trigger.click(function() {
            if(titleVal){
                _setText(title, titleVal);
            }
            if(subtitleVal){
                _setText(subtitle, subtitleVal);
            }
            if(textVal){
                _setText(text, textVal);
            }
            if(subjectVal){
                _setValue(subject, subjectVal);
            }
            if(fromVal){
                _setValue(from, fromVal);
            }
            if(btnVal){
                _setValue(btn, btnVal);
            }

            target.addClass('open');
        });

        overlay.click(function() {
           _close();
        });

        closeBtn.click(function() {
           _close();
        });

        return this;
    };
}( jQuery ));



// Initialization
	$(document).ready(function() {




        $('.jsModalTrigger').popup();











        /* This script supports IE9+ */
            //(function() {
            //    /* Opening modal window function */
            //    function openModal() {
            //        /* Get trigger element */
            //        var modalTrigger = document.getElementsByClassName('jsModalTrigger');
            //
            //        /* Set onclick event handler for all trigger elements */
            //        for(var i = 0; i < modalTrigger.length; i++) {
            //            modalTrigger[i].onclick = function() {
            //                var target = this.getAttribute('data-target');
            //                var modalWindow = document.getElementById(target);
            //
            //                modalWindow.classList ? modalWindow.classList.add('open') : modalWindow.className += ' ' + 'open';
            //            }
            //        }
            //    }
            //
            //    function closeModal(){
            //        /* Get close button */
            //        var closeButton = document.getElementsByClassName('jsModalClose');
            //        var closeOverlay = document.getElementsByClassName('jsOverlay');
            //
            //        /* Set onclick event handler for close buttons */
            //        for(var i = 0; i < closeButton.length; i++) {
            //            closeButton[i].onclick = function() {
            //                var modalWindow = this.parentNode.parentNode;
            //
            //                modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
            //            }
            //        }
            //
            //        /* Set onclick event handler for modal overlay */
            //        for(var i = 0; i < closeOverlay.length; i++) {
            //            closeOverlay[i].onclick = function() {
            //                var modalWindow = this.parentNode;
            //
            //                modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
            //            }
            //        }
            //
            //    }
            //
            //    /* Handling domready event IE9+ */
            //    function ready(fn) {
            //        if (document.readyState != 'loading'){
            //            fn();
            //        } else {
            //            document.addEventListener('DOMContentLoaded', fn);
            //        }
            //    }
            //
            //    /* Triggering modal window function after dom ready */
            //    ready(openModal);
            //    ready(closeModal);
            //}());






	}); //popups
