<?php


function button_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'url' => ''
	), $atts );

	if ( !empty( $a['url'] ) && !empty( $content ) ) {
		return '<a href="' . $a['url'] . '" class="btn">' . $content . '</a>';
	}
}
add_shortcode( 'button', 'button_shortcode' );

