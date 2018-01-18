<?php

/*
Template Name: Generic 2-column
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="wrap group two-column">

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

		<div class="quarter left-menu">

			<?php
			if ( has_cmb2_value('left_content') ) {
				show_cmb2_wysiwyg_value('left_content');
			}
			?>

		</div>

		<div class="content-wide">
			<?php the_wide_content(); ?>
		</div>

	</div>

	<div class="wrap">
		<?php the_photo_grid(); ?>
	</div>

<?php get_footer(); ?>