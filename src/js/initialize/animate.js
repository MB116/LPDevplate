/*-------------------------------------------------------*\
					Waypoint animation
\*-------------------------------------------------------*/
;

// Home page: http://imakewebthings.com/jquery-waypoints/

// Required plugins
	require('../plugins/jquery.waypoints.js');
	require('../plugins/jquery.waypointAnimate.js');

// Initialization
	$(document).ready(function() {

		$(".benefits__col").waypointAnimate('fadeIn');

	}); //waypoints