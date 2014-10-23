<?php


// register a couple nav menus
register_nav_menus( array(
	'main-menu' => 'Main Menu',
	'footer-menu' => 'Footer Menu',
    'academics-primary' => 'Academics Menu',
    'academics-buttons' => 'Academics Buttons'
) );



function get_all_menus(){
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 

    $generated = array( '' => '- select a menu -' );
    foreach ( $menus as $menu ) {
    	$generated[$menu->slug] = $menu->name;
    }

    return $generated;
}


if ( function_exists('register_sidebar') ) {
 	register_sidebar(array(
		'name'=> 'Academics',
		'id' => 'academics',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
 	register_sidebar(array(
		'name'=> 'Tumblr Feed',
		'id' => 'tumblr',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}


function left_menu_display( $position = 'primary' ) {

    // grab the menu the user selected in the menus metabox.
    $menu_name = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_" . $position, 1 );

    // verify that the menu exists by checking the menu name to see if it's empty
    if ( !empty( $menu_name ) ) {

        // display the menu
        wp_nav_menu( array( 
            'menu' => $menu_name, 
            'menu_class' => 'nav-menu' )
        );
    }

}






?>