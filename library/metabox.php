<?php


// initiate the metabox plugin
add_action( 'init', 'p_init_cmb_meta_boxes', 9999 );
function p_init_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'metabox/init.php' );
    }
}


function cmb_select_style() {
  echo '<style>
    .cmb_select#_p_fund_form {
        width: 100% !important;
    } 
  </style>';
}
add_action('admin_head', 'cmb_select_style');


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

    // emergency bar
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

    // menu metabox
    $meta_boxes['menu_box'] = array(
        'id' => 'menu_box',
        'title' => 'Page Menus',
        'pages' => array( 'page' ), // post type
        'show_on' => array( 
            'key' => 'page-template', 
            'value' => array(
                'page-campus-map.php',
                'page-counselor-map.php',
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
		'pages' => array( 'page', 'area', 'fund' ), // post type
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


    // faculty info
    $meta_boxes['faculty_info'] = array(
        'id' => 'faculty_info',
        'title' => 'Faculty Member Information',
        'pages' => array( 'faculty' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'First Name',
                'id' => CMB_PREFIX . 'faculty_fname',
                'type' => 'text_medium'
            ),
            array(
                'name' => 'Last Name',
                'id' => CMB_PREFIX . 'faculty_lname',
                'type' => 'text_medium'
            ),
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


    // get list of gravity forms
    $all_forms = GFAPI::get_forms();
    $forms = array();
    $forms[0] = '- no form selected -';
    foreach ( $all_forms as $form ) {
        $forms[$form['fields'][0]->formId] = $form['title'];
    }


    // fund metabox
    $meta_boxes['fund_metabox'] = array(
        'id' => 'fund_metabox',
        'title' => 'Fund Information',
        'pages' => array( 'fund' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Goal',
                'id' => CMB_PREFIX . 'fund_goal',
                'type' => 'text_money'
            ),
            array(
                'name' => 'Form',
                'id' => CMB_PREFIX . 'fund_form',
                'type' => 'select',
                'default' => 0,
                'options' => $forms
            ),
        )
    );


    // fund listing metabox
    $fund_categories = get_fund_categories();
    foreach ( $fund_categories as $fundcat ) {
        $fundcats[$fundcat->term_id] = $fundcat->name;
    }
    $meta_boxes['fund_category_metabox'] = array(
        'id' => 'fund_category_metabox',
        'title' => 'Fund Categories',
        'pages' => array( 'page' ), // post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'page-fundlist.php' ),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Fund Categories',
                'id' => CMB_PREFIX . 'fund_category',
                'type' => 'multicheck',
                'options' => $fundcats
            ),
        )
    );



    // infographic metabox
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


    // tab box
    $meta_boxes['tab_metabox'] = array(
        'id' => 'tab_metabox',
        'title' => 'Tab Box',
        'pages' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'tabs',
                'type' => 'group',
                'description' => __('Manage a tab component - please limit to 3 tabs so it fits on larger screens.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Tab', 'cmb'),
                    'remove_button' => __('Remove Tab', 'cmb'),
                    'sortable' => true, // beta
                ),
                'fields' => array(
                    array(
                        'name' => 'Title',
                        'description' => 'Set a 1-2 word (if possible) title for the tab.',
                        'id'   => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Content',
                        'description' => 'Enter the content of the tab.',
                        'id'   => 'content',
                        'type' => 'textarea_code',
                    ),
                ),
            )
        )
    );


    // accordions
    $meta_boxes['accordion_metabox'] = array(
        'id' => 'accordion_metabox',
        'title' => 'Accordion Boxes',
        'pages' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'id' => CMB_PREFIX . 'accordions',
                'type' => 'group',
                'description' => __('Manage accordions.', 'cmb'),
                'options' => array(
                    'add_button' => __('Add Accordion Box', 'cmb'),
                    'remove_button' => __('Remove Accordion Box', 'cmb'),
                    'sortable' => true, // beta
                ),
                'fields' => array(
                    array(
                        'name' => 'Title',
                        'description' => 'Set a title for the box.',
                        'id'   => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Open By Default',
                        'desc' => 'Open by default',
                        'id' => 'open',
                        'type' => 'checkbox'
                    ),
                    array(
                        'name' => 'Content',
                        'description' => 'Enter the content of the box.',
                        'id'   => 'content',
                        'type' => 'textarea_code',
                    ),
                ),
            )
        )
    );


    $args = array( 'post_type' => 'faculty', 'posts_per_page' => -1 );
    $loop = new WP_Query( $args );
    $faculty = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $faculty[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_query();


    // area of interest information
    $meta_boxes['area_info'] = array(
        'id' => 'area_info',
        'title' => 'Area of Interest Details',
        'pages' => array( 'area' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Advising',
                'id' => CMB_PREFIX . 'area_advising',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Overview Document URL',
                'id' => CMB_PREFIX . 'area_facebook',
                'type' => 'file'
            ),
            array(
                'name' => 'Faculty',
                'desc' => 'Select the faculty related to this area of interest.',
                'id' => CMB_PREFIX . 'area_faculty_list',
                'type' => 'multicheck',
                'options' => $faculty,
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
            array(
                'name' => 'Unique Opportunities',
                'id' => CMB_PREFIX . 'area_opportunities',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Ensembles',
                'id' => CMB_PREFIX . 'area_ensembles',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Facilities',
                'id' => CMB_PREFIX . 'area_facilities',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Events',
                'id' => CMB_PREFIX . 'area_events',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Past Productions',
                'id' => CMB_PREFIX . 'area_productions',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Alumni Profiles',
                'id' => CMB_PREFIX . 'area_alumni',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Graduate Success',
                'id' => CMB_PREFIX . 'area_success',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Clinical Supervisors',
                'id' => CMB_PREFIX . 'area_supervisors',
                'type' => 'wysiwyg'
            ),
            array(
                'name' => 'Be a Teacher',
                'id' => CMB_PREFIX . 'area_teacher',
                'type' => 'wysiwyg'
            ),
        ),
    );


    // area of interest information
    $meta_boxes['wide_column'] = array(
        'id' => 'wide_column',
        'title' => 'Wide Column',
        'pages' => array( 'page' ), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Wide Content Column',
                'id' => CMB_PREFIX . 'wide_content',
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



/**
 * Metabox for Page Template
 * @author Kenneth White 
 * @link https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress/wiki/Adding-your-own-show_on-filters
 *
 * @param bool $display
 * @param array $meta_box
 * @return bool display metabox
 */
function be_metabox_show_on_template( $display, $meta_box ) {

    if( 'template' !== $meta_box['show_on']['key'] )
        return $display;

    // Get the current ID
    if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
    elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
    if( !isset( $post_id ) ) return false;

    $template_name = get_page_template_slug( $post_id );
    $template_name = substr($template_name, 0, -4);

    // If value isn't an array, turn it into one
    $meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];

    // See if there's a match
    return in_array( $template_name, $meta_box['show_on']['value'] );
}
add_filter( 'cmb_show_on', 'be_metabox_show_on_template', 10, 2 );



?>