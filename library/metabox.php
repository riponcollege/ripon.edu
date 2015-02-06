<?php


// initiate the metabox plugin
add_action( 'init', 'p_init_cmb_meta_boxes', 9999 );
function p_init_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'metabox/init.php' );
    }
}



/**
 * Include metabox on front page
 * @author Ed Townend
 * @link https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function p_metabox_include_front_page( $display, $meta_box ) {
    if ( 'front-page' !== $meta_box['show_on']['key'] )
        return $display;

    // Get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    //return false early if there is no ID
    if( !isset( $post_id ) ) return false;

    //Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option('page_on_front');

    if ( $post_id == $front_page ) {
        //there is a front page set and we're on it!
        return $display;
    }

}
add_filter( 'cmb_show_on', 'p_metabox_include_front_page', 10, 2 );




// add metabox(es)
function page_metaboxes( $meta_boxes ) {

    // footer quote
    $meta_boxes['emergency'] = array(
        'id' => 'emergency',
        'title' => 'Emergency Bar',
        'pages' => array( 'page' ), // post type
        'show_on' => array( 
            'key' => 'front-page', 
            'value' => '' 
        ),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Emergency Text',
                'id' => CMB_PREFIX . 'emergency_text',
                'type' => 'textarea'
            ),
            array(
                'name' => 'Link',
                'id' => CMB_PREFIX . 'emergency_link',
                'type' => 'text_url'
            ),
        ),
    );


    $all_menus = get_all_menus();

    // second blockquote
    $meta_boxes['menu_box'] = array(
        'id' => 'menu_box',
        'title' => 'Page Menus',
        'pages' => array( 'page' ), // post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => array(
                'page-3-column.php',
                'page-2-column.php'
            )
        ),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Title',
                'desc'    => 'The title above the left menu.',
                'id'   => CMB_PREFIX . 'menu_title',
                'type' => 'text',
            ),
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
            array(
                'name'    => 'Footer Menu',
                'desc'    => 'Select the menu that shows in the "take action" nav.',
                'id'      => CMB_PREFIX . 'menu_footer',
                'type'    => 'select',
                'options' => $all_menus,
                'default' => 'footer-navigation',
            ),
        ),
    );


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
                'name'    => 'Slider Type',
                'description' => "Select the type of slider to display.",
                'id'      => CMB_PREFIX . 'showcase-type',
                'type'    => 'radio_inline',
                'options' => array(
                    'photo-large'   => __( 'Large Photo', 'cmb' ),
                    'photo-medium'  => __( 'Medium Photo', 'cmb' ),
                    'photo-small'   => __( 'Small Photo', 'cmb' ),
                    'two-column'    => __( 'Two Column', 'cmb' ),
                ),
                'default' => 'photo-medium',
            ),
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
            array(
                'name' => 'Professional/Scholarly Affiliations',
                'id' => CMB_PREFIX . 'faculty_affiliations',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Presentations',
                'id' => CMB_PREFIX . 'faculty_presentations',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Pedagogy',
                'id' => CMB_PREFIX . 'faculty_pedagogy',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Production Credits',
                'id' => CMB_PREFIX . 'faculty_credits',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Professional Experience',
                'id' => CMB_PREFIX . 'faculty_experience',
                'type' => 'wysiwyg'
            ),
        ),
    );


    // showcase metabox
    $meta_boxes['infographic_metabox'] = array(
        'id' => 'infographic_metabox',
        'title' => 'Infographic',
        'pages' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'id'   => CMB_PREFIX . 'infographic_image',
                'name' => 'Infographic Image',
                'description' => 'Select a square-shaped, blurry image so that it can be used on all screen sizes as a background for the infographic.',
                'type' => 'file',
                'preview_size' => array( 400, 400 )
            ),
            array(
                'id' => CMB_PREFIX . 'infographic',
                'type' => 'group',
                'description' => __('Add data points into the infographic.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Datapoint', 'cmb'),
                    'remove_button' => __('Remove Datapoint', 'cmb'),
                    'sortable' => true, // beta
                ),
                'fields' => array(
                    array(
                        'name' => 'Icon',
                        'description' => 'Select an icon image.',
                        'id'   => 'image',
                        'type' => 'file',
                        'preview_size' => array( 100, 100 )
                    ),
                    array(
                        'name' => 'Percentage',
                        'description' => 'Enter a percentage for this datapoint.',
                        'id'   => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Subtitle',
                        'description' => 'Enter the percentage label.',
                        'id'   => 'subtitle',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'id' => CMB_PREFIX . 'infographic_buttons',
                'type' => 'group',
                'description' => __('Add buttons under the infographic.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Button', 'cmb'),
                    'remove_button' => __('Remove Button', 'cmb'),
                    'sortable' => true, // beta
                ),
                'fields' => array(
                    array(
                        'name' => 'Button Text',
                        'id'   => 'text',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Button Link',
                        'id'   => 'link',
                        'type' => 'text',
                    ),
                ),
            ),
        )
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


    // photo grid that can be used on any page
    $meta_boxes['photo_grid'] = array(
        'id' => 'photo_grid',
        'title' => 'Photo Grid',
        'pages' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Title',
                'id'   => CMB_PREFIX . 'photo_grid_title',
                'type' => 'text',
            ),
            array(
                'name' => 'Description',
                'id'   => CMB_PREFIX . 'photo_grid_description',
                'type' => 'textarea_small',
            ),
            array(
                'id' => CMB_PREFIX . 'photo_grid',
                'type' => 'group',
                'description' => __('Add photos to the photo grid component.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Another Photo', 'cmb'),
                    'remove_button' => __('Remove Photo', 'cmb'),
                    'sortable' => true, // beta
                ),
                'fields'      => array(
                    array(
                        'name' => 'Title',
                        'id'   => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Link URL',
                        'description' => "The address you'd like this photo and title to link to.",
                        'id'   => 'link',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Image',
                        'id'   => 'image',
                        'type' => 'file',
                        'preview_size' => array( 250, 250 )
                    ),
                ),
            ),
        )
    );


    return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'page_metaboxes' );


function get_cmb_value( $field ) {
    return get_post_meta( get_the_ID(), CMB_PREFIX . $field, 1 );
}



?>