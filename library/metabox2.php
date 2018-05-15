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




    $args = array( 'post_type' => 'faculty', 'posts_per_page' => -1 );
    $loop = new WP_Query( $args );
    $faculty = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $faculty[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_query();


    $categories = get_categories();

    // area of interest information
    $area_box = new_cmb2_box( array(
        'id' => 'area_info',
        'title' => 'Area of Interest Details',
        'object_types' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ) );
    $area_box->add_field( array(
        'name' => 'Advising',
        'id' => CMB_PREFIX . 'area_advising',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 10
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Faculty',
        'desc' => 'Select the faculty related to this area of interest.',
        'id' => CMB_PREFIX . 'area_faculty_list',
        'type' => 'multicheck_inline',
        'options' => $faculty,
    ) );
    $area_box->add_field( array(
        'name' => 'Requirements',
        'id' => CMB_PREFIX . 'area_requirements',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 10
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Sample Schedule',
        'id' => CMB_PREFIX . 'area_schedule',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 10
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Sidebar Video',
        'id' => CMB_PREFIX . 'area_sidebar_video',
        'type' => 'text_url'
    ) );

    $all_tags = get_tags();
    $tag_options = array(
        '' => '-- None --'
    );
    foreach ( $all_tags as $tag ) {
        $tag_options[$tag->slug] = $tag->name;
    }
    $area_box->add_field( array(
        'name' => 'Post Tag',
        'id' => CMB_PREFIX . 'area_post_tag',
        'type' => 'select',
        'options' => $tag_options,
        'default' => get_cmb2_value( 'area_post_tag' )
    ));


    $area_box->add_field( array(
        'name' => 'Overview Document URL',
        'id' => CMB_PREFIX . 'area_facebook',
        'type' => 'file'
    ) );
    $area_box->add_field( array(
        'name' => 'Faculty',
        'id' => CMB_PREFIX . 'area_faculty',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Career Tracks',
        'id' => CMB_PREFIX . 'area_tracks',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Off-Campus Study',
        'id' => CMB_PREFIX . 'area_off_campus',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Unique Opportunities',
        'id' => CMB_PREFIX . 'area_opportunities',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Ensembles',
        'id' => CMB_PREFIX . 'area_ensembles',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Facilities',
        'id' => CMB_PREFIX . 'area_facilities',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Events',
        'id' => CMB_PREFIX . 'area_events',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Past Productions',
        'id' => CMB_PREFIX . 'area_productions',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Alumni Profiles',
        'id' => CMB_PREFIX . 'area_alumni',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Graduate Success',
        'id' => CMB_PREFIX . 'area_success',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Clinical Supervisors',
        'id' => CMB_PREFIX . 'area_supervisors',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );
    $area_box->add_field( array(
        'name' => 'Be a Teacher',
        'id' => CMB_PREFIX . 'area_teacher',
        'type' => 'wysiwyg',
        'options' => array (
        	'textarea_rows' => 7
        )
    ) );

    

    // accordion metabox
    $tab_metabox = new_cmb2_box( array(
        'id' => 'tab_metabox',
        'title' => 'Tab Boxes',
        'desc' => 'Boxes of content that are accessed via tabs on the left column.',
        'object_types' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
    ) );

    $tab_metabox_group = $tab_metabox->add_field( array(
        'id' => CMB_PREFIX . 'tab',
        'type' => 'group',
        'options' => array(
            'add_button' => __('Add Tab', 'cmb'),
            'remove_button' => __('Remove Tab', 'cmb'),
            'group_title'   => __( 'Tab {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'sortable' => true, // beta
        )
    ) );

    $tab_metabox->add_group_field( $tab_metabox_group, array(
        'name' => 'Title',
        'id'   => 'title',
        'type' => 'text',
        'sanitization_cb' => false
    ) );

    $tab_metabox->add_group_field( $tab_metabox_group, array(
        'name' => 'Content',
        'id'   => 'content',
        'type' => 'wysiwyg',
        'show_names' => false,
        'options' => array(
        	'textarea_rows' => 10
        )
    ) );




	/*
	// showcase metabox
	$showcase = new_cmb2_box( array(
		'id' => 'showcase_metabox',
		'title' => 'Showcase',
		'object_type' => 'page',
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => false // Show field names on the left
	) );

    $showcase->add_field( 
        array(
            'name'    => 'Slider Type',
            'description' => "Select the type of slider to display.",
            'id'      => $prefix . 'showcase-type',
            'type'    => 'radio_inline',
            'options' => array(
                'photo-large'   => __( 'Large Photo', 'cmb' ),
                'photo-medium'  => __( 'Medium Photo', 'cmb' ),
                'photo-small'   => __( 'Small Photo', 'cmb' ),
                'two-column'    => __( 'Two Column', 'cmb' ),
            ),
            'default' => 'photo-medium'
        )
    );
    
    $showcase_group = $cmb->add_field( array(
        'id' => $prefix . 'showcase',
        'type' => 'group',
        'description' => __('Add images/videos into a slider on any page.', 'cmb'),
        'options' => array(
            'add_button' => __('Add Slide', 'cmb'),
            'remove_button' => __('Remove Slide', 'cmb'),
            'sortable' => true, // beta
        )
    ) );

	$showcase->add_group_field( $showcase_group, 
		array(
			'name' => 'Title',
			'description' => 'Enter a slide title.',
			'id'   => 'title',
			'type' => 'text',
		)
	);

	$showcase->add_group_field( $showcase_group, 
		array(
			'name' => 'Subtitle',
			'description' => 'Enter the slide content.',
			'id'   => 'subtitle',
			'type' => 'wysiwyg',
		)
	);

	$showcase->add_group_field( $showcase_group, 
		array(
			'name' => 'Link',
			'description' => 'Enter a slide link.',
			'id'   => 'link',
			'type' => 'text',
		)
	);

	$showcase->add_group_field( $showcase_group, 
		array(
			'name' => 'Image/Video',
			'description' => 'Select an image or paste in a video URL.',
			'id'   => 'image',
			'type' => 'file',
			'preview_size' => array( 350, 150 )
		)
	);

	$showcase->add_group_field( $showcase_group, 
        array(
            'name' => 'Button Text',
            'description' => 'Enter button text for the call to action button. Leave empty for no button.',
            'id'   => 'button',
            'type' => 'text',
        )
	);
	*/

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