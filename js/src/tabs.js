

// tab controls
jQuery(document).ready(function($){

	if ( $( '.tab-content:first' ).length ) {

		$( '.tab-nav li' ).click(function(){
			
			var target_class = $( this ).attr( 'class' );
			var content_top = $( '.tab-container' ).offset().top;

			$( '.tab-content:not(.'+target_class+'):visible' ).slideUp( 'slow' );
			$( '.tab-content.'+target_class+':hidden' ).slideDown( 'slow' );

			// scroll up if we're past the top of the content
			$( 'html,body' ).animate({ scrollTop: content_top }, 700 );

		});
	}

});

