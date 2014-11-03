<?php
/**
 * The Template for displaying all single posts
 */

get_header();

$education = get_cmb_value( "faculty_education" );
$courses = get_cmb_value( "faculty_courses" );
$awards = get_cmb_value( "faculty_awards" );
$publications = get_cmb_value( "faculty_publications" );
$areas = get_cmb_value( "faculty_areas" );

?>
	<div id="primary" class="faculty wrap group" role="main">

		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				?>
		<div class="third">
			<div class="faculty-info">
				<?php the_post_thumbnail() ?>
				<h2><?php the_title(); ?></h2>
				<p class="faculty-title"><?php print get_cmb_value( "faculty_title" ); ?></p>
				<p class="faculty-contact">
					<a href="mailto:<?php print get_cmb_value( "faculty_email" ); ?>"><?php print get_cmb_value( "faculty_email" ); ?></a><br>
					<?php print get_cmb_value( "faculty_phone" ); ?><br>
					Office: <?php print get_cmb_value( "faculty_office" ); ?>
				</p>
			</div>
			<div class="tab-nav">
				<ul>
					<li class="one">Basic Information</li>
					<li class="two">Awards &amp; Honors</li>
					<li class="three">Publications</li>
					<li class="four">Areas of Interest &amp; Research</li>
				</ul>
			</div>
		</div><!-- #content -->
		<div class="two-third tab-container">

			<div class="tab-content one">
				<h1>Basic Information</h1>
				<?php 
				if ( !empty( $education ) ) { 
					?>
				<h3>Education</h3>
					<?php 
					print wpautop( $education );
				} 
				?>
				<?php 
				if ( !empty( $courses ) ) { 
					?>
				<h3>Courses Taught</h3>
					<?php 
					print wpautop( $courses );
				} 
				?>
			</div>

			<div class="tab-content two">
				<h1>Awards &amp; Honors</h1>
				<?php 
				if ( !empty( $awards ) ) { 
					?>
					<?php 
					print wpautop( $awards );
				} 
				?>
			</div>

			<div class="tab-content three">
				<h1>Publications</h1>
				<?php 
				if ( !empty( $publications ) ) { 
					?>
					<?php 
					print wpautop( $publications );
				} 
				?>
			</div>

			<div class="tab-content four">
				<h1>Areas of Interest &amp; Research</h1>
				<?php 
				if ( !empty( $areas ) ) { 
					?>
					<?php 
					print wpautop( $areas );
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