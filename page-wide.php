<?php
/*
Template Name: Generic 1-column (No Title, Full Width)
*/
get_header();

?>

	<?php the_showcase(); ?>

	<div class="page-title group">
		<div class="wrap">
			<div class="three-quarter">
				<h1><?php the_title() ?></h1>
			</div>
		</div>
	</div>

	<?php 
	while ( have_posts() ) : the_post(); ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>

		<?php
	endwhile; 
	?>
	
	<?php the_phototiles(); ?>
	
	<?php the_buttons(); ?>

<?php

get_footer();

?>