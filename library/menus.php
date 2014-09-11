<?php


// register a couple nav menus
register_nav_menus( array(
	'primary' => 'Main Menu',
	'footer' => 'Footer Menu'
) );


if ( function_exists('register_sidebar') ) {
 	register_sidebar(array(
		'name'=> 'Tumblr Feed',
		'id' => 'tumblr',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}

?>