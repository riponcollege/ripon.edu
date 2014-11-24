<?php
/**
 * The Template for displaying all single posts
 */

get_header();

$overview_url = get_cmb_value( "area_url" );
$faculty = get_cmb_value( "area_faculty" );
$tracks = get_cmb_value( "area_tracks" );
$off_campus = get_cmb_value( "area_off_campus" );

?>
	<div id="primary" class="faculty wrap group" role="main">

		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
		<div class="third">
			<div class="tab-nav">
				<ul>
					<li class="one">Overview</li>
					<li class="two">Faculty</li>
					<li class="three">Career Tracks</li>
					<li class="four">Off-Campus Study</li>
				</ul>
			</div>
		</div><!-- #content -->
		<div class="two-third tab-container">

			<h1><?php the_title(); ?></h1>
			<div class="tab-content one">
				<?php 
					?>
				<h2>Overview</h2>
				<?php 
				the_content();
				
				?>

				<div class="two-third no-pad">
					<h2>Advising</h2>
					<p>Ripon College encourages all students to embrace a Four-Year Career Development Plan.</p>
					<p>This plan is based on the premise that career planning is a development process that involves learning and decision-making over an extended period of time.</p>
					<p><a href="#" class="btn-red-full">Advising</a></p>
				</div>
				<div class="third sidebar">
					<div class="widget-book">
						<h4>Course &amp; Requirements</h4>
						<ul>
							<li><a href="<?php  ?>"><?php the_title(); ?> Course Overview</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="tab-content two">
				<h2>Faculty</h2>
				<?php 
				if ( !empty( $faculty ) ) { 
					?>
					<?php 
					print wpautop( $faculty );
				} 
				?>
			</div>

			<div class="tab-content three">
				<h2>Career Tracks</h2>
				<?php 
				if ( !empty( $tracks ) ) { 
					?>
					<?php 
					print wpautop( $tracks );
				} 
				?>
			</div>

			<div class="tab-content four">
				<h2>Off-Campus Study</h2>
				<?php 
				if ( !empty( $off_campus ) ) { 
					?>
					<?php 
					print wpautop( $off_campus );
				} 
				?>
			</div>

		</div>
			<?php
			endwhile;
		endif;
		 ?>

	</div><!-- #primary -->
<?php

get_footer();

?>