<?php


// initiate the metabox plugin
add_action( 'init', 'p_init_cmb_meta_boxes', 9999 );
function p_init_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'metabox/init.php' );
    }
}





// add metabox(es)
function page_metaboxes( $meta_boxes ) {

	// showcase metabox
	$meta_boxes['showcase_metabox'] = array(
		'id' => 'showcase_metabox',
		'title' => 'Showcase',
		'pages' => array( 'page' ), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'showcase',
                'type' => 'group',
                'description' => __('Add images/videos into a slider on any page.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Slide', 'cmb'),
                    'remove_button' => __('Remove Slide', 'cmb'),
                    'sortable' => true, // beta
                ),
				'fields' => array(
					array(
						'name' => 'Title',
						'description' => 'Enter a slide title.',
						'id'   => 'title',
						'type' => 'text',
					),
					array(
						'name' => 'Subtitle',
						'description' => 'Enter the slide content.',
						'id'   => 'subtitle',
						'type' => 'wysiwyg',
					),
					array(
						'name' => 'Link',
						'description' => 'Enter a slide link.',
						'id'   => 'link',
						'type' => 'text',
					),
					array(
						'name' => 'Image/Video',
						'description' => 'Select an image or paste in a video URL.',
						'id'   => 'image',
						'type' => 'file',
						'preview_size' => array( 350, 150 )
					),
                    array(
                        'name'    => 'Text Color',
                        'description' => "Set to dark when you have a bright image.",
                        'id'      => 'color',
                        'type'    => 'select',
                        'options' => array(
                            'white' => __( 'White', 'cmb' ),
                            'black' => __( 'Black', 'cmb' ),
                        ),
                    ),
				),
            ),
        )
	);


    // footer quote
    $meta_boxes['faculty_info'] = array(
        'id' => 'faculty_info',
        'title' => 'Faculty Member Information',
        'pages' => array( 'faculty' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Title',
                'id' => CMB_PREFIX . 'faculty_title',
                'type' => 'text'
            ),
            array(
                'name' => 'Office Number',
                'id' => CMB_PREFIX . 'faculty_office',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Phone Number',
                'id' => CMB_PREFIX . 'faculty_phone',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Email Address',
                'id' => CMB_PREFIX . 'faculty_email',
                'type' => 'text_email'
            ),
            array(
                'name' => 'Facebook',
                'id' => CMB_PREFIX . 'faculty_facebook',
                'type' => 'text_url'
            ),
            array(
                'name' => 'LinkedIn',
                'id' => CMB_PREFIX . 'faculty_linkedin',
                'type' => 'text_url'
            ),
            array(
                'name' => 'Twitter',
                'id' => CMB_PREFIX . 'faculty_twitter',
                'type' => 'text_url'
            ),
            array(
                'name' => 'Education',
                'id' => CMB_PREFIX . 'faculty_education',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Courses Taught',
                'id' => CMB_PREFIX . 'faculty_courses',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Awards/Honors',
                'id' => CMB_PREFIX . 'faculty_awards',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Publications',
                'id' => CMB_PREFIX . 'faculty_publications',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Areas of Interest',
                'id' => CMB_PREFIX . 'faculty_areas',
                'type' => 'wysiwyg'
            ),
        ),
    );


    // footer quote
    $meta_boxes['area_info'] = array(
        'id' => 'area_info',
        'title' => 'Area of Interest Details',
        'pages' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Overview Document URL',
                'id' => CMB_PREFIX . 'area_facebook',
                'type' => 'text_url'
            ),
            array(
                'name' => 'Faculty',
                'id' => CMB_PREFIX . 'area_faculty',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Career Tracks',
                'id' => CMB_PREFIX . 'area_tracks',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Off-Campus Study',
                'id' => CMB_PREFIX . 'area_off_campus',
                'type' => 'wysiwyg'
            ),
        ),
    );


    $all_menus = get_all_menus();

    // second blockquote
    $meta_boxes['menu_box'] = array(
        'id' => 'menu_box',
        'title' => 'Page Menus',
        'pages' => array( 'page' ), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-custom-menus.php' ),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name'    => 'Primary Menu',
                'desc'    => 'The left column top menu.',
                'id'      => CMB_PREFIX . 'menu_primary',
                'type'    => 'select',
                'options' => $all_menus,
            ),
            array(
                'name'    => 'Button Menu',
                'desc'    => 'The button menu in the left column.',
                'id'      => CMB_PREFIX . 'menu_buttons',
                'type'    => 'select',
                'options' => $all_menus,
            ),
        ),
    );


    return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'page_metaboxes' );


function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}


?>