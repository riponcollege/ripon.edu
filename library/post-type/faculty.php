<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );



// let's create the function for the custom type
function faculty_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'faculty', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => array(
				'name' => __( 'Faculty', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Faculty', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Faculty', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Faculty Member', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Faculty Member', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Faculty Member', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Faculty', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Faculty', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the batabase.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage the faculty in the staff directory.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/img/icon-cap-small.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 
				'slug' => 'faculty', 
				'with_front' => false 
			), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'faculty' );
	
}


// adding the function to the Wordpress init
add_action( 'init', 'Faculty_post_type');



// now let's add custom categories (these act like categories)
register_taxonomy( 'faculty_cat', 
	array('faculty'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Faculty Categories', 'ptheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Faculty Category', 'ptheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Faculty Categories', 'ptheme' ), /* search title for taxomony */
			'all_items' => __( 'All Faculty Categories', 'ptheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Faculty Category', 'ptheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Faculty Category:', 'ptheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Faculty Category', 'ptheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Faculty Category', 'ptheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Faculty Category', 'ptheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Faculty Category Name', 'ptheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 
			'slug' => 'faculty-category'
		)
	)
);



function list_faculty_category( $category ) {

	// set up some args
	$args = array( 
		'post_type' => 'faculty', 
		'posts_per_page' => 999, 
		'orderby' => 'title', 
		'order' => 'ASC', 
		'tax_query' => array( 
			array(
				'taxonomy' => 'faculty_cat',
				'field' => 'slug',
				'terms' => $category
			) 
		) 
	);

	$show_links = true;

	// check if it's the beyond ripon page
	if ( is_page( 'beyond-ripon' ) ) {
		// don't link the items if it's that
		$show_links = false;
	}

	// grab category information
	$category_info = get_term_by( 'slug', $category, 'faculty_cat' );

	// start up a loop
	$loop = new WP_Query( $args );

	?>
	<h3><?php print $category_info->name ?></h3>
	<ul>
	<?php
	// loop through the post results
	while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<li><?php if ( $show_links ) { ?><a href="<?php the_permalink() ?>"><?php } ?><?php the_title(); ?><?php if ( $show_links ) { ?></a><?php } ?></li>
		<?php
	endwhile;
	?>
	</ul>
	<?php
	
	// reset the post data
	wp_reset_postdata();

}


?>