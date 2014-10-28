

// tab controls
jQuery(document).ready(function($){

	$( '.tab-nav li' ).click(function(){
		
		var target_class = $( this ).attr( 'class' );

		$( '.tab-content:not(.'+target_class+'):visible' ).slideUp( 'slow' );
		$( '.tab-content.'+target_class+':hidden' ).slideDown( 'slow' );

		console.log( 'tab content top', $( '.tab-content:first' ).offset().top );
		console.log( 'scroll position', $( 'body' ).scrollTop() );

		// scroll up if we're past the top of the content
		var content_top = $( '.tab-content:first' ).offset().top;
		if ( $( 'body' ).scrollTop() > content_top ) {
			$( 'html,body' ).animate({ scrollTop: content_top-50 }, 700 );
		}

	});

});

