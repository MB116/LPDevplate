/*-------------------------------------------------------*\
        Scroll to
\*-------------------------------------------------------*/
;
// Home page: http://manos.malihu.gr/page-scroll-to-id/

// Required plugins
    require('../plugins/jquery.malihu.PageScroll2id.js');

// Initialization
    $(document).ready(function() {
    /*
    * Scroll top button
    */
        // Fade in scroll-up btn
        $(window).scroll(function(){
            if( $(this).scrollTop() > 200 ){
                $('#jsScrollTop').fadeIn();
            }else{
                $('#jsScrollTop').fadeOut();
            }
        });

        //Scroll to top animation
        $('#jsScrollTop').click(function(){
            $('body,html').animate({
                scrollTop:0
            },
                400
            );
            return false;
        });

    /*
     * Scrollto Id
     */
        $(".jsScrollTo").mPageScroll2id();

    }); //scroll to