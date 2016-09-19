<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 
	
?>

	<section id="primary" class="content-area wrap group" role="main">

		<div class="content-wide">

			<h1 class="page-title">Crowdfunding Campaigns</h1>

			<?php 

			global $wp_query;
			$wp_query->query_vars["orderby"] = 'title';
			$wp_query->query_vars["order"] = 'ASC';
			$wp_query->get_posts();

			if ( have_posts() ) : 
				?>

			<div class="crowd-funding">
			<?php

				// Start the Loop.
				while ( have_posts() ) : the_post(); 
					?>
					<div class="fund">
						<a href="<?php the_permalink() ?>">
						<div class="photo">
							<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} else {
								print '<img src="https://placehold.it/500x500">';
							}

							$fund_form_id = get_cmb_value( 'fund_form' );
							$fund_goal = get_cmb_value( 'fund_goal' );
							if ( $fund_form_id != 0 && $fund_goal > 0 ) {
								$fund_donations = get_fund_total( $fund_form_id );
								print '<h4 class="fund-total">' . round( $fund_totals['total'] / $fund_goal, 1 ) . '% Funded <span>(' . $fund_totals['count'] . ' Donors)</span></h4>';
							}
							?>
						</div>
						<div class="info">
							<h4><?php the_title(); ?></h4>
							<?php the_excerpt(); ?>
						</div>
						</a>
					</div>
					<?php

				endwhile;
				?>
				<div class="pagination">
					<?php echo paginate_links(); ?>
				</div>
				<?php
			else : ?>
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