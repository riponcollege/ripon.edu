<?php
/**
 * The Template for displaying all single posts
 */

get_header();

the_showcase();

?>
	<div id="primary" class="wrap group">
		<div id="content" class="content-narrow" role="main">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
				<h1><?php the_title(); ?></h1>
				<?php

				$fund_form_id = get_cmb_value( 'fund_form' );
				$fund_goal = get_cmb_value( 'fund_goal' );
				if ( $fund_form_id != 0 ) {
					$fund_donations = get_fund_total( $fund_form_id );
					print '<h4 class="fund-total"><span>Goal Progress:</span> $' . $fund_donations['total'] . " / $" .  $fund_goal . ' (' . round( $fund_totals->donation_total / $fund_goal, 1 ) . '%)</h4>';
				}

				// the_post_thumbnail();

				the_content();

				// grab the form ID and get info and display if a form has been set.
				if ( $fund_form_id != 0 ) {
					// display the actual form
					print do_shortcode("[gravityform id=" . $fund_form_id . " title=false description=false]");
				} else {
					print "<p class='no-form quiet'>No form has been selected for this crowdfunding campaign, please click 'Edit' in the top bar and select the form that should show up in this section.</p>";
				}

			endwhile;
		endif;
		 ?>
		</div><!-- #content -->

	</div><!-- #primary -->
<?php

get_footer();

?>