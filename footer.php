<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>	
	
		</div>

	</section>
	
	<footer class="footer fixed">
			
		<nav role="navigation">
			<?php wp_nav_menu( array( 
				'theme_location' => 'footer', 
				'menu_class' => 'nav-menu' ) 
			); ?>
		</nav>

	</footer><!-- #colophon -->
	
	<div class="colophon">
		
		<div class="addresses">
			<strong>Physical Address:</strong> <span class="fold"><a href="https://www.google.com/maps/place/300+Seward+St,+Ripon,+WI+54971/@43.8432217,-88.8409595,17z/data=!3m1!4b1!4m2!3m1!1s0x8801543f4dcd4019:0xbdb7efb240144666">300 W. Seward St. Ripon, WI</a></span><br>
			<strong>Mailing Address:</strong> <span class="fold">PO Box 248 Ripon, WI 54971-0248</span>
		</div>
		<div class="electronic">
			<strong>Email:</strong> <span class="fold"><a href="adminfo@ripon.edu">adminfo@ripon.edu</a></span><br>
			<strong>Phone:</strong> <span class="fold">800-947-4766</span>
		</div>
		
		<a href="#" class="campus-map">Campus Map</a>

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>