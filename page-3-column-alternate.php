<?php

/*
Template Name: Generic 3-column (Alternate Menus)
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="page-title group">
		<div class="wrap">
			<div class="quarter">&nbsp;</div>
			<div class="three-quarter">
				<h1><?php the_title() ?></h1>
			</div>
		</div>
	</div>
	<div class="wrap group three-column">

		<div class="quarter left-menu">

			<?php left_menu_display( 'primary' ); ?>

		</div>

		<div class="half">

			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

				<?php
			endwhile; 
			?>

		</div>

		<div class="quarter sidebar">

			<?php left_menu_display( 'secondary' ); ?>

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-generic') ) : ?><!-- no sidebar --><?php endif; ?>

		</div>

		<div class="three-quarter right">
			<?php the_tab_box(); ?>

			<?php the_accordions(); ?>
		</div>

		<?php the_wide_content(); ?>

	</div>

	<?php the_phototiles(); ?>

	<?php the_buttons(); ?>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>

<?php get_footer(); ?>