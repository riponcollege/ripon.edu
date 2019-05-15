<?php


function button_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'url' => '',
		'color' => 'green'
	), $atts );

	if ( !empty( $a['url'] ) && !empty( $content ) ) {
		return '<a href="' . $a['url'] . '" class="btn ' . $a['color'] . '">' . $content . '</a>';
	}
}
add_shortcode( 'button', 'button_shortcode' );

