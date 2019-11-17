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



function the_buttons() {

	// get the background photo
    $photo = get_post_meta( get_the_ID(), CMB_PREFIX . "infographic_image", 1 );

	// get the buttons
	$buttons = get_post_meta( get_the_ID(), CMB_PREFIX . "infographic_buttons", 1 );

	if ( !empty( $buttons ) ) {
		?>
		<h2 class="infographic-title"><?php print $title; ?></h2>
		<div class="infographic bg-red-light" style="background-image: url(<?php print $photo ?>);">
			<div class="wrap <?php print $class; ?>">
				<div class="infographic-buttons">
				<?php
				if ( !empty( $buttons ) ) {
					foreach ( $buttons as $key => $button ) {
						// store the title and subtitle
						$text = ( isset( $button["text"] ) ? $button["text"] : '' );
						$link = ( isset( $button["link"] ) ? $button["link"] : '' );
						?>
						<a href="<?php print $link; ?>" class="btn"><?php print $text; ?></a>
						<?php
					}
				}
				?>
				</div>
			</div>
		</div>
		<?php
	}
}


