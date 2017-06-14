<?php


if ( file_exists( __DIR__ . '/cmb2/init.php' ) ) {
  require_once __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once __DIR__ . '/CMB2/init.php';
}


add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_p_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id' => 'map_metabox',
		'title' => __( 'Map Information', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'show_on' => array( 
			'key' => 'page-template', 
			'value' => 'page-map.php'
		),
		'context' => 'normal', //  'normal', 'advanced', or 'side'
		'priority' => 'high',  //  'high', 'core', 'default' or 'low'
		'show_names' => true, // Show field names on the left
	) );

	// Regular text field
	$cmb->add_field( array(
		'name' => 'Button 1 Text',
		'id' => $prefix . 'map-button-1-text',
		'type' => 'text',
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => 'Button 1 URL',
		'id'   => $prefix . 'map-button-1-url',
		'type' => 'text_url',
	) );

	// Regular text field
	$cmb->add_field( array(
		'name' => 'Button 2 Text',
		'id' => $prefix . 'map-button-2-text',
		'type' => 'text',
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => 'Button 2 URL',
		'id'   => $prefix . 'map-button-2-url',
		'type' => 'text_url',
	) );

	// Regular text field
	$cmb->add_field( array(
		'name' => 'Button 3 Text',
		'id' => $prefix . 'map-button-3-text',
		'type' => 'text',
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => 'Button 3 URL',
		'id'   => $prefix . 'map-button-3-url',
		'type' => 'text_url',
	) );

	// URL text field
	$cmb->add_field( array(
		'name' => 'Embed URL',
		'id'   => $prefix . 'map-url',
		'type' => 'text_url',
	) );

}




// get CMB value
function get_cmb2_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


// get CMB value
function has_cmb2_value( $field ) {
    $cval = get_cmb_value( $field );
    return ( !empty( $cval ) ? true : false );
}


// get CMB value
function show_cmb2_value( $field ) {
    print get_cmb_value( $field );
}


// get CMB value
function show_cmb2_wysiwyg_value( $field ) {
    print apply_filters( 'the_content', get_cmb_value( $field ) );
}





?>