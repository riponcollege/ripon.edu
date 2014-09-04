<?php

get_header();

?>

	<?php the_showcase(); ?>

	<main class="content-narrow">

		<?php 
		while ( have_posts() ) : the_post();
			the_content();
		endwhile; 
		?>

	</main><!-- #primary -->

<?php

get_footer();

?>