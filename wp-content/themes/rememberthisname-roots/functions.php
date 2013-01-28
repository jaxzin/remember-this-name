<?php

function randomize_main_query_posts( $query ) {
	if ( $query->is_home() ) { // Run only on the homepage
		$query->set('orderby', 'rand');
		$query->set('posts_per_page', '20');
		$query->set('post_type', array('post', 'rtn-bio-page'));
//		$query->query_vars['orderby'] = 'rand';
//		$query->query_vars['posts_per_page'] = 20;
	}
}
add_action( 'pre_get_posts', 'randomize_main_query_posts' );

function my_wp_nav_menu_args( $args = '' ){
	$args['menu_class'] = 'nav pull-right';
	return $args;
} // function
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

/*
add_action( 'init', 'create_profile_post_type' );
function create_profile_post_type() {

	$labels = array(
		'name'               => _x( 'Profiles', 'post type general name' ),		
		'singular_name'      => _x( 'Profile', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'rtn_profile' ),
		'add_new_item'       => __( 'Add New Profile' ),
		'edit_item'          => __( 'Edit Profile' ),
		'new_item'           => __( 'New Profile' ),
		'all_items'          => __( 'All Profiles' ),
		'view_item'          => __( 'View Profile' ),
		'search_items'       => __( 'Search Profiles' ),
		'not_found'          => __( 'No profiles found' ),
		'not_found_in_trash' => __( 'No profiles found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Profiles'
	);
	
	$args = array(
		'labels'        => $labels,
		'description'   => 'Profile pages for the innocent lives that have been lost',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions' ),
		'has_archive'   => true,
		'rewrite' => array('slug' => 'profile')
	);
	
	register_post_type( 'rtn_profile', $args );
}

add_action( 'init', '', 0 );
function () {
	$labels = array(
		'name'              => _x( 'Product Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Categories' ),
		'all_items'         => __( 'All Product Categories' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Edit Product Category' ), 
		'update_item'       => __( 'Update Product Category' ),
		'add_new_item'      => __( 'Add New Product Category' ),
		'new_item_name'     => __( 'New Product Category' ),
		'menu_name'         => __( 'Product Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'product_category', 'product', $args );
}

*/

?>