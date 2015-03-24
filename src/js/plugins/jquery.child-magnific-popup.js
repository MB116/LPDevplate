//My jQuery Modal Forms and/or Alertboxes plugin
(function ( $ ) {
    'use strict';

    $.fn.popup = function () {

        //Elements
        var trigger     = this;
        var title       = $('#jsModalTitle');
        var subtitle    = $('#jsModalSubtitle');
        var text        = $('#jsModalText');
        var subject     = $('#jsModalSubject');
        var from        = $('#jsModalFrom');
        var btn         = $('#jsModalBtn');

        //Values
        var titleVal    = trigger.data('title');
        var subtitleVal = trigger.data('subtitle');
        var textVal     = trigger.data('text');
        var subjectVal  = trigger.data('subject');
        var fromVal     = trigger.data('from');
        var btnVal      = trigger.data('btn');

        //Setting value to inputs
        function _setValue(element, value){
            element.val(value);
        }

        //Setting text in html tags
        function _setText(element, text){
            element.text(text);
        }

        trigger.magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: false,

            //overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in',

            callbacks: {
                open: function() {
                    //Setting custom values for each modal form
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
                        _setText(btn, btnVal);
                    }
                }
            }
        });

        return this;
    };
})( jQuery );/**
 * Created by Kanat on 24.03.2015.
 */
