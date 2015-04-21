/*-------------------------------------------------*\
		Any custom script of that application
\*-------------------------------------------------*/
;

$(document).ready(function() {
    //Analytics bounce rate trigger
    $(window).on('scroll.custom', function () {
        var windowScroll = $(this).scrollTop();

        if(windowScroll >= 200){
            ga('send', 'event', 'ОТКАЗ', 'СКРОЛЛ');
            $(window).off('scroll.custom');
        }
    });

});