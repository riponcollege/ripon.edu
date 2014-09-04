<?php

/*
Template Name: Front Page
*/

get_header();

?>

	<div class="home-showcase">
		
		<?php the_showcase(); ?>

		<nav class="iam">
			<div class="wrap">
				<h3>I Am A(n):</h3>
				<ul>
					<li><a href="#">Accepted Student</a></li>
					<li><a href="#">Alumna/us</a></li>
					<li><a href="#">Current Student</a></li>
					<li><a href="#">Faculty/Staff</a></li>
					<li><a href="#">Interested Student</a></li>
					<li><a href="#">Parent/Family</a></li>
					<li><a href="#">Employer</a></li>
				</ul>
			</div>
		</nav>

	</div>

	<div class="wrap group">

		<div class="news">
			<h3>Ripon <span>News</span></h3>
			<?php
			query_posts( 'posts_per_page=3' );
			if ( have_posts() ) {
				$num = 1;
				while ( have_posts() ) {
					the_post();
					?> 
			<article<?php print ( $num == 1 ? ' class="first"' : '' ); ?>>
				<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
				<?php the_excerpt() ?>
			</article>
					<?php
					$num++;
				} // end while
			} // end if
			?>
			<p><a href="/news/" class="more">Read more news stories</a></p>
		</div>

		<div class="events">
			<h3>Ripon <span>Events</span></h3>
			<article class="first">
				<div class="date">
					Jul <span>20</span>
				</div>
				<h4><a href="#">An Event Title</a></h4>
				<p>Fusce ullamcorper risus tortor, imperdiet ultricies tellus lacinia et. Sed non nulla metus... <a href="">Read More...</a></p>
			</article>
			<article>
				<div class="date">
					Aug <span>1</span>
				</div>
				<h4><a href="#">Another Event Title</a></h4>
				<p>Curabitur tempus vel risus sed elementum. Praesent nec blandit nunc, id consequat enim. Nullam cursus ex nec viverra mattis... <a href="">Read More...</a></p>
			</article>
			<article>
				<div class="date">
					Aug <span>15</span>
				</div>
				<h4><a href="#">Yet Another Event Title</a></h4>
				<p>Quisque id ligula venenatis, venenatis nibh vel, aliquet nisi... <a href="">Read More...</a></p>
			</article>
			<p><a href="#" class="more">See more events</a></p>
		</div>

		<div class="spotlight">

			<h3>Ripon <span>Spotlight</span></h3>
			<iframe src="//player.vimeo.com/video/9953368" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		
		</div>

	</div>

	<div class="social wrap">
		
		<h3>Connect with Ripon on <span>Social Media</span></h3>
		<div class="icons group">
			<a href="http://www.facebook.com/ripon.college"><img src="<?php print get_template_directory_uri() ?>/img/social-facebook.png"></a>
			<a href="https://twitter.com/riponcollege"><img src="<?php print get_template_directory_uri() ?>/img/social-twitter.png"></a>
			<a href="http://www.youtube.com/riponcollegevideo"><img src="<?php print get_template_directory_uri() ?>/img/social-youtube.png"></a>
			<a href="http://instagram.com/riponcollege"><img src="<?php print get_template_directory_uri() ?>/img/social-instagram.png"></a>
			<a href="http://riponcollegeadmission.tumblr.com/"><img src="<?php print get_template_directory_uri() ?>/img/social-tumblr.png"></a>
			<a href="https://www.flickr.com/photos/ripon_college/"><img src="<?php print get_template_directory_uri() ?>/img/social-flickr.png"></a>
			<a href="http://www.linkedin.com/groups?home=&gid=4646327&trk=anet_ug_hm"><img src="<?php print get_template_directory_uri() ?>/img/social-linkedin.png"></a>
		</div>
		<div class="feed-twitter">
			<h4>@RIPONREDHAWKS</h4>
			<div class="feed">
				<?php twitter_posts() ?>
			</div>
		</div>

	</div>

<?php get_footer(); ?>