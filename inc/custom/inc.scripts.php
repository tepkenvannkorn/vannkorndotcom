<?php

/**
 * Enqueue scripts and styles.
 */
 
function vannkorn_scripts() {
	
	wp_enqueue_script( 'vannkorn-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '2021001', true );

	if ( is_archive() || is_search() || is_front_page() || is_home() ) {

		global $wp_query;

		// register load more script
		wp_register_script( 'vannkorn-loadmore', get_stylesheet_directory_uri() . '/assets/js/loadmore.js', array('jquery') );
	
		// we have to pass parameters to loadmore.js script but we can get the parameters values only in PHP
		// we can define variables directly in your HTML, but the most proper way is wp_localize_script()
		wp_localize_script( 'vannkorn-loadmore', 'vannkorn_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
			'posts' => json_encode( $wp_query->query_vars ),
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages
		) );
	
		wp_enqueue_script( 'vannkorn-loadmore' );

	}
	
	wp_enqueue_script( 'vannkorn-main', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '2021005', true );
	
	wp_enqueue_style( 'vannkorn-fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css' );
	
	wp_enqueue_style( 'vannkorn-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'vannkorn_scripts' );