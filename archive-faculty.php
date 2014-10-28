<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 
	
?>

	<section id="primary" class="content-area wrap group" role="main">

		<div class="quarter left-menu">
			
			<div class="menu-primary">
				<h5 class="menu-title">Academics</h5>
				<?php wp_nav_menu( array( 'theme_location' => 'academics-primary', 'menu_class' => 'nav-menu' ) ); ?>
			</div>
			<div class="menu-buttons"><?php wp_nav_menu( array( 'theme_location' => 'academics-buttons', 'menu_class' => 'nav-menu' ) ); ?></div>

		</div>

		<div class="three-quarter">

			<h1 class="page-title">Faculty Directory</h1>

			<form role="search" method="get" id="searchform" class="searchform faculty-search" action="/faculty" _lpchecked="1">
				<input type="hidden" name="post_type" value="faculty" />
				<input type="text" value="" name="s" id="s" placeholder="Search Name, Academic Department Or Area of Interest">
				<input type="hidden" name="post_type" value="faculty" />
				<input type="submit" id="searchsubmit" value="Search">
			</form>

			<?php if ( have_posts() ) : ?>

			<div class="faculty-directory">
			<?php

				// Start the Loop.
				while ( have_posts() ) : the_post(); 
					?>
					<div class="faculty-entry">
						<?php the_post_thumbnail(); ?>
						<div class="info">
							<a href="<?php the_permalink(); ?>" class="btn">View Profile &raquo;</a>
							<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
							<p class="faculty-title"><?php print get_cmb_value( "faculty_title" ); ?></p>
							<a href="mailto:<?php print get_cmb_value( "faculty_email" ); ?>"><?php print get_cmb_value( "faculty_email" ); ?></a>
						</div>
					</div>
					<?php

				endwhile;

			else :
				
				?>
				<p>No results for that search term.</p>
				<?php

			endif;
			?>
			</div>

		</div>

	</section><!-- #primary -->

<?php

get_footer();

?>