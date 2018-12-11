

// alum controls
jQuery(document).ready(function($){

	$('.open-alum-link').magnificPopup({
		type: 'inline',
		midClick: true
	});


	$('.alum-add-story').on( 'click', function(){
		$('.alum-add-story-form').show();
	});

	$('.year-more').on( 'click', function(){
		$('.year-more-details').show();
		$('.year-more').hide();
	});

});

