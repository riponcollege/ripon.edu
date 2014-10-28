<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

?>

	<section id="primary" class="content-area wrap group" role="main">

		<?php if ( have_posts() ) : ?>

		<h1 class="page-title">
			<?php
			if ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'twentyfourteen' ), get_the_date() );

			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'twentyfourteen' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyfourteen' ) ) );

			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'twentyfourteen' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentyfourteen' ) ) );

			else :
				_e( 'Archives', 'twentyfourteen' );

			endif;
			?>
		</h1>

		<?php
		
			// Start the Loop.
			while ( have_posts() ) : the_post(); 
				?>
				<h3><?php the_title(); ?></h3>
				<?php the_excerpt(); ?>
				<?php
			endwhile;

		else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );

		endif;
		?>

	</section><!-- #primary -->

<?php

get_footer();

?>