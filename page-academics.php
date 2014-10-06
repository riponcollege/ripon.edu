<?php

/*
Template Name: Page - Academics
*/

get_header();

?>

	<div class="wrap group academics three-column">

		<div class="showcase">
			
			<?php the_showcase(); ?>

		</div>

		<div class="quarter left-menu">

			<div class="menu-primary">
			<h5 class="menu-title">Academics</h5>
			<?php left_menu_display( 'primary' ); ?></div>
			<div class="menu-buttons"><?php left_menu_display( 'buttons' ); ?></div>

		</div>

		<div class="half">

			<?php 
			while ( have_posts() ) : the_post(); ?>
			
			<h1><?php the_title() ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

				<?php
			endwhile; 
			?>

		</div>

		<div class="quarter sidebar">

			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('academics')) : ?>
			[ please add some widgets to the academics sidebar ]
			<?php endif; ?>

		</div>

	</div>

<?php get_footer(); ?>