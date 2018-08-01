<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>
	<div id="primary" class="wrap group">
		<div id="content" class="content-wide" role="main">
		<?php 
		if ( have_posts() ) : ?>
			<div class="two-third entry-content">
			<?php
			while ( have_posts() ) : the_post(); 
				?>
				<h1><?php the_title(); ?></h1>
				<?php the_post_thumbnail(); ?>
				<?php the_content(); ?>
				<p class="post-meta">
					Posted <?php the_date(); ?> in <?php print get_the_category_list( ", ", "", get_the_ID() ); ?> by <?php the_author_link() ?>.
				</p>
		 	</div>
		 	<div class="third">
		 		<p>&nbsp;</p>
		 		<p>&nbsp;</p>
				<?php
				$cat_list = get_the_category_list( ",", "", get_the_ID() );
				if ( !empty( $cat_list ) ) {
					print "<h3>Related Posts</h3>";
					print do_shortcode('[display-posts category="' . $cat_list . '" posts_per_page=5 /]');
				}
				?>
				<!-- here -->
				<?php
			endwhile;
			?>
		 	</div>
		 	<?php
		endif;
		?>
		</div><!-- #content -->

	</div><!-- #primary -->
<?php

get_footer();

?>