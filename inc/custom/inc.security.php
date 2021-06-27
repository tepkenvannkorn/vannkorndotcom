<?php

/* Block from reading wp-config.php file */

$transient_name = 'wce_block_' . $_SERVER['REMOTE_ADDR'];

$transient_value = get_transient( $transient_name );

if ( $transient_value !== false ) {
	
	die( 'BANNED!' );

}

if ( isset( $_GET['wp_config_enumeration'] ) ) {
	
	set_transient( $transient_name, 1, DAY_IN_SECONDS );
	
	die( 'BANNED!' );

}

/* Disable User Agent for WP Scan */

if ( ! empty( $_SERVER['HTTP_USER_AGENT'] ) && preg_match( '/WPScan/i', $_SERVER['HTTP_USER_AGENT'] ) ) {

	die( 'WP Scan is blocked in this site!' );

}

/** Remove strange XML-RPC server info. */

function add_fake_xmlrpc() {
	
	// We don’t want to display die(‘XML-RPC server accepts POST requests only.’); on $_GET
	
	if ( !empty( $_POST ) ) {
		
		return 'wp_xmlrpc_server';
	
	} else {
	
		return 'fake_xmlrpc';
	
	}

}

class fake_xmlrpc {

	function serve_request() {
		
		// It's fake 😉
		die();
	}

}

add_filter( 'wp_xmlrpc_server_class', 'add_fake_xmlrpc' );

/* Remove Generator information */

add_filter( 'the_generator', 'remove_generator' );

	function remove_generator() {

		// Return nothing
		return ' ';

}

remove_action( 'wp_head', 'wp_generator' );

/* Remove version number from stylesheet */

function remove_version_number_from_css() {
	
	global $wp_version;
	
	$wp_version = '168.0';

}

add_action( 'init', 'remove_version_number_from_css' );

/* Prevent advanced fingerprinting */

if ( isset( $_GET['advanced_fingerprinting'] ) ) {

	switch ( $_GET['advanced_fingerprinting'] ) {

		case ‘1’:
			
			// Unpack file
			$file = gzopen( ABSPATH . 'wp-includes/js/tinymce/wp-tinymce.js.gz', 'rb' );

		// Add comment
		$out = '// ' . uniqid( true ) . "\n";

		while ( ! gzeof( $file ) ) {

			$out .= gzread( $file, 4096 );
		}

		// Pack again
		header( 'Content-type: application/x-gzip' );

		echo gzencode( $out );
		
		break;

		default:
		
			status_header( 404 );
	}

	die();

}

/* Stop plugin enumeration. */

if ( isset( $_GET['plugin_enumeration'])) {

	// Display something random
	
	die( '' );
}

/* Prevent username enumeration. */

if ( ! is_admin() && isset( $_REQUEST[ 'author' ] ) ) {

	status_header(404);

	die();

}