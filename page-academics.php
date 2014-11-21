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
				<?php wp_nav_menu( array( 'theme_location' => 'academics-primary', 'menu_class' => 'nav-menu' ) ); ?>
			</div>
			<div class="menu-buttons"><?php wp_nav_menu( array( 'theme_location' => 'academics-buttons', 'menu_class' => 'nav-menu' ) ); ?></div>

		</div>
	
		<div class="three-quarter no-pad">
			<div class="two-third">

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

			<div class="third sidebar">

				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('academics')) : ?>
				[ please add some widgets to the academics sidebar ]
				<?php endif; ?>

			</div>

		</div>

		<div class="area-tabs full-width group">
			<ul class="area-tab-navigation">
				<li>Majors<span> &amp; Pre-Professional Tracks</span></li>
				<li>Minors</li>
			</ul>
			<div class="area-tab-content majors">
				<?php list_area_category( "major" ) ?>
			</div>
			<div class="area-tab-content minors">
				<?php list_area_category( "minor" ) ?>
			</div>
		</div>

	</div>

<?php get_footer(); ?>