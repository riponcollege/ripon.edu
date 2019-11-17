<?php


function the_phototiles() {
	$tiles = get_cmb_value( 'phototiles' );
	if ( !empty( $tiles ) ) {
		?>
		<div class="phototiles">
		<?php
		foreach ( $tiles as $tile ) {
			if ( !empty( $tile['title'] ) && !empty( $tile['background'] ) && !empty( $tile['content'] ) ) {
				if ( !empty( $tile['link'] ) ) { ?><a href="<?php print $tile['link'] ?>"><?php } 
				?>
			<div class="phototile" style="background-image: url(<?php print $tile['background'] ?>);">
				<div class="phototile-title"><?php print $tile['title'] ?></div>
				<div class="phototile-subtitle"><?php print $tile['subtitle'] ?></div>
				<div class="phototile-content <?php print $tile['color'] ?>"><?php print $tile['content'] ?></div>
			</div>
				<?php
				if ( !empty( $tile['link'] ) ) { ?></a><?php } 
			}
		}
	}
}

