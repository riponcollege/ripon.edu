

// tab controls
jQuery(document).ready(function($){

	if ( $( '.tab-content:first' ).length ) {
		var content_top = $( '.tab-content:first' ).offset().top;

		$( '.tab-nav li' ).click(function(){
			
			var target_class = $( this ).attr( 'class' );

			$( '.tab-content:not(.'+target_class+'):visible' ).slideUp( 'slow' );
			$( '.tab-content.'+target_class+':hidden' ).slideDown( 'slow' );

			// scroll up if we're past the top of the content
			if ( $( 'body' ).scrollTop() > content_top ) {
				$( 'html,body' ).animate({ scrollTop: content_top-50 }, 700 );
			}

		});
	}

});

