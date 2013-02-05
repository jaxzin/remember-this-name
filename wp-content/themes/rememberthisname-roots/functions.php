<?php

function randomize_main_query_posts( $query ) {
	if ( $query->is_home() ) { // Run only on the homepage
		$query->set('orderby', 'rand');
		$query->set('posts_per_page', '20');
	}
}
add_action( 'pre_get_posts', 'randomize_main_query_posts' );

function my_wp_nav_menu_args( $args = '' ){
	$args['menu_class'] = 'nav pull-right';
	return $args;
} // function
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

?>