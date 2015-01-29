
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
			<h1>Search Results for <span>'<?php print $_REQUEST["s"]; ?>'</span></h1>

			<div class="content-narrow">
			<?php
			while ( have_posts() ) : the_post();
				?>
				<hr>
				<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<?php
			endwhile;
			?>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->

