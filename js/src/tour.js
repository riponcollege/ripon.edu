

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
			var $video_section = $tour.find( '.section-video.'+video_id );

			// show the video for that section
			$video_section.fadeIn( 500 );

			// hide the mission statement
			$tour.find( '.tour-mission' ).fadeOut( 500 );

			// hide all the tour section buttons
			$tour.find( '.tour-sections' ).addClass( 'hidden' );

			// get the photos if they exist
			var $images = $video_section.find( '.video' );

			// if we have more than one image
			if ( $images.find( '.next-photo' ) ) {

				// select all the photos
				var all_photos = $images.children( '.photo' );

				// when you click the next photo button
				$images.find( '.next-photo' ).on( 'click.tour', function(){

					// get the currently visible
					var current_photo = $images.children( '.photo:visible' );

					// get the next photo - if it's empty, return to the beginning
					var next_photo = ( current_photo.next( '.photo' ).length > 0 ? current_photo.next( '.photo' ) : all_photos.first() );
					
					// hide the current photo, and show the next one.
					current_photo.hide();
					next_photo.show();
				
				});

				// when you click the next photo button
				$images.find( '.prev-photo' ).on( 'click.tour', function(){

					// get the currently visible
					var current_photo = $images.children( '.photo:visible' );

					// get the next photo - if it's empty, return to the beginning
					var prev_photo = ( current_photo.prev( '.photo' ).length > 0 ? current_photo.prev( '.photo' ) : all_photos.last() );
					
					// hide the current photo, and show the next one.
					current_photo.hide();
					prev_photo.show();
				
				});

			}
		});

	}


});

