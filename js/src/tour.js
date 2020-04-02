

// onload tour stuffs
jQuery(document).ready(function($){
	
	var win_width = $(window).width();
	var no_touch = $('html').hasClass( 'no-touchevents' );

	// if we're on the tour page.
	if ( $( '.tour' ) ) {

		// select the tour section just once so we don't have to repeat ourselves.
		var $tour = $( '.tour' );
		
		if ( win_width < 900 || !no_touch ) {

			// when someone clicks on one of the section handles
			$tour.find( '.section > a' ).on( 'click.tour', function(){

				// expand that section of links
				$(this).parent( '.section' ).toggleClass( 'open' );

			});

		} else {

			// when someone clicks on one of the section handles
			$tour.find( '.section' ).on( 'mouseover.tour', function(){

				// expand that section of links
				$(this).addClass( 'open' );

			});

			// when someone clicks on one of the section handles
			$tour.find( '.section' ).on( 'mouseout.tour', function(){

				// expand that section of links
				$(this).removeClass( 'open' );

			});

		}


		// when someone clicks to close a section video
		$tour.find( '.section-close' ).on( 'click.tour', function(){

			// hide the video section
			$tour.find( '.section-video:visible' ).fadeOut( 500 );

			// show the mission statement
			$tour.find( '.tour-mission' ).fadeIn( 500 );

			// show the tour section buttons
			$tour.find( '.tour-sections' ).removeClass( 'hidden' );
		});

		// when you click on a 'show-video' link
		$tour.find( '.show-video' ).on( 'click.tour', function(){

			// grab the video ID
			var video_id = $(this).attr('class').replace( 'show-video ', '' );

			// show the video for that section
			$tour.find( '.section-video.'+video_id ).fadeIn( 500 );

			// hide the mission statement
			$tour.find( '.tour-mission' ).fadeOut( 500 );

			// hide all the tour section buttons
			$tour.find( '.tour-sections' ).addClass( 'hidden' );
		});

	}

});

