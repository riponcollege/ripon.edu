<?php

/*
Template Name: Generic 2-column
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="wrap group two-column">

		<div class="quarter left-menu">

			<?php left_menu_display(); ?>

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif; ?>

		</div>

		<div class="three-quarter">

			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<h1><?php the_title() ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

				<?php
			endwhile; 

			the_tab_box();

			the_accordions();
			?>

		</div>

		<?php the_wide_content(); ?>

	</div>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>

<?php get_footer(); ?>