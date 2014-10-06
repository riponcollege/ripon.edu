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
			<?php wp_nav_menu( array( 'theme_location' => 'academics-top', 'menu_class' => 'nav-menu' ) ); ?>
			<div class="menu-buttons"><?php wp_nav_menu( array( 'theme_location' => 'academics-bottom', 'menu_class' => 'nav-menu' ) ); ?></div>

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