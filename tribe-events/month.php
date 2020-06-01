<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

do_action( 'tribe_events_before_template' );

// Title Bar
tribe_get_template_part( 'month/title-bar' );

// Tribe Bar
tribe_get_template_part( 'modules/bar' );
?>
<div style="background-color: #fecb00; color: black; padding: 5px 8px;"><strong>Due to COVID-19</strong>, all college-sponsored events have been postponed until further notice or until virtual arrangements can be made.</div><br>
<?php
// Main Events Content
tribe_get_template_part( 'month/content' );

do_action( 'tribe_events_after_template' );