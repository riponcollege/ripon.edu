<?php


// register a couple nav menus
register_nav_menus( array(
	'primary' => 'Main Menu',
	'footer' => 'Footer Menu',
    'academics-top' => 'Academics - Top',
    'academics-bototm' => 'Academics - Bottom'
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

    $menu_name = get_post_meta( get_the_ID(), CMB_PREFIX . "menu_" . $position, 1 );

	wp_nav_menu( array( 
		'menu' => $menu_name, 
		'menu_class' => 'nav-menu' )
	);

}






?>