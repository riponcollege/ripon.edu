<?php

/*
Template Name: Tour
*/

get_header();

// get all the tour box links
$tour_about = get_cmb2_value( 'tour_about' );
$tour_academics = get_cmb2_value( 'tour_academics' );
$tour_student = get_cmb2_value( 'tour_student' );
$tour_wellness = get_cmb2_value( 'tour_wellness' );
$tour_map = get_cmb2_value( 'tour_map' );


function do_section( $section_label, $tour ) {
	if ( !empty( $tour ) ) { ?>
		<ul>
		<?php foreach ( $tour as $key => $link ) { ?>
			<li><a class="show-video <?php print $section_label; ?>-<?php print $key ?>"><?php print $link['title']; ?></a></li>
		<?php } ?>
		</ul>
		<?php 
	}
}

function do_section_videos( $section_label, $tour ) {
	if ( !empty( $tour ) ) {
			foreach ( $tour as $key => $link ) {
				?>
		<div class="section-video <?php print $section_label; ?>-<?php print $key ?>">
			<a class="section-close">Back to Tour Home</a>
			<div class="video">
				<?php print apply_filters( 'the_content', $link['video'] ); ?>
			</div>
			<div class="caption">
				<h3><?php print $link['title'] ?></h3>
				<div class="caption-inner">
					<?php print apply_filters( 'the_content', $link['content'] ); ?>
				</div>
			</div>
		</div>
			<?php 
		}
	}
}

?>
	
	<div class="tour">

		<video autoplay muted loop class="tour-background"><source src="https://www.ripon.edu/wp-content/uploads/2018/11/Website-Background-General-720.mp4" type="video/mp4"></video>

		<div class="tour-sections">
			<div class="section about">
				<a class="handle">About Ripon</a>
				<div class="links">
					<?php do_section( 'about', $tour_about ); ?>
				</div>
			</div>

			<div class="section academics">
				<a class="handle">Academics</a>
				<div class="links">
					<?php do_section( 'academics', $tour_academics ); ?>
				</div>
			</div>

			<div class="section student">
				<a class="handle">Student Life</a>
				<div class="links">
					<?php do_section( 'student', $tour_student ); ?>
				</div>
			</div>

			<div class="section wellness">
				<a class="handle">Health & Wellness</a>
				<div class="links">
					<?php do_section( 'wellness', $tour_wellness ); ?>
				</div>
			</div>

			<div class="section map">
				<a class="handle">Campus Map</a>
				<div class="links">
					<?php do_section( 'map', $tour_map ); ?>
				</div>
			</div>
		</div>

		<?php if ( has_cmb2_value( 'tour_info_mission' ) ) { ?>
		<div class="tour-mission">
			<strong>Our Mission:</strong> <?php show_cmb2_value( 'tour_info_mission' ); ?>
		</div>
		<?php } ?>

		<div class="tour-videos">
			<?php do_section_videos( 'about', $tour_about ); ?>
			<?php do_section_videos( 'academics', $tour_academics ); ?>
			<?php do_section_videos( 'student', $tour_student ); ?>
			<?php do_section_videos( 'wellness', $tour_wellness ); ?>
			<?php do_section_videos( 'map', $tour_map ); ?>
		</div>

	</div>


<?php 

get_footer(); 

?>