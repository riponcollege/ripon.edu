<?php


error_reporting( E_ALL );
ini_set( "display_errors", 1 );


// set a custom field prefix
define( "CMB_PREFIX", "_p_" );



// remove the editor from the homepage
add_filter( 'user_can_richedit', 'ripon_page_can_richedit' );
function ripon_page_can_richedit( $can ) {
    global $post;
    if ( 28 == $post->ID )
        return false;
    return $can;
}


// include some theme-related things
include( "library/menus.php" );
include( "library/scripts.php" );


// an extra image manipulation function
include( "library/images.php" );


// include our metaboxes library
include( "library/metabox.php" );


// include quote metaboxes/functions
include( "library/showcase.php" );
include( "library/content.php" );


?>