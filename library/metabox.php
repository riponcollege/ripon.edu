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
						'description' => 'Enter a slide subtitle.',
						'id'   => 'subtitle',
						'type' => 'text',
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


    $all_menus = get_all_menus();

    // second blockquote
    $meta_boxes['menu_box'] = array(
        'id' => 'menu_box',
        'title' => 'Page Menus',
        'pages' => array( 'page' ), // post type
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



?>