//My custom plugin for using waypoint and animateCSS
(function($) {

    $.fn.waypointAnimate = function(animateIn) {

        $(this).waypoint(function(direction) {
            if (direction === "down") {
                $(this).addClass(animateIn).css("visibility", "visible");
            }
        }, {
            offset: "80%", triggerOnce: true
        });

    }

})( jQuery );