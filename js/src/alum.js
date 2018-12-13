

// alum controls
jQuery(document).ready(function($){

	$('.open-alum-link').magnificPopup({
		type: 'inline',
		midClick: true
	});


	$('.alum-add-story').on( 'click', function(){
		$('.alum-add-story-form').show();
	});

	$('.alum-back').on( 'click', function(){
		location.href = '/alums/';
	});

	$('.year-more').on( 'click', function(){
		$('.year-more-details').show();
		$('.year-more').hide();
	});

});

