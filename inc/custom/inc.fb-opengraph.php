<?php

// Adding the Open Graph in the Language Attributes

function add_opengraph_doctype( $output ) {

	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	
}

add_filter('language_attributes', 'add_opengraph_doctype');


// Lets add Open Graph Meta Info

function insert_fb_in_head() {

	global $post;
	
	if ( ! is_singular() ) // if it is not a post or a page
	
		return;
	
	echo "<meta property='og:title' content='" . get_the_title() . "' />";
	
	echo "<meta property='og:site_name' content='" . get_bloginfo( 'name' ) . "' />";
	
	echo "<meta property='og:url' content='" . get_permalink() . "' />";

	if ( ! has_post_thumbnail( $post->ID ) ) { // the post does not have featured image, use a default image

		$default_image = get_stylesheet_directory_uri() . "/images/default-thumbnail.png";
		
		echo "<meta property='og:image' content='" . $default_image . "' />";

		echo "<meta property='og:image:type' content='image/jpeg' />";

		echo "<meta property='og:image:width' content='1024' />";

		echo "<meta property='og:image:height' content='768' />";
		
	} else {
	
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		
		if ( is_array( $thumbnail_src ) ) {
		
			echo "<meta property='og:image' content='" . esc_attr( $thumbnail_src[0] ) . "' />";
		
		} else {
			
			echo "<meta property='og:image' content='" . esc_attr( $thumbnail_src ) . "'/>";
			
		}

		/* Array Results 
		 * $src[0] => url
		 * $src[1] => width
		 * $src[2] => height
		 * $src[3] => icon
		 */

		echo "<meta property='og:image:type' content='image/jpeg' />";

		echo "<meta property='og:image:width' content='" . esc_attr( $thumbnail_src[1] ) . "' />";

		echo "<meta property='og:image:height' content='" . esc_attr( $thumbnail_src[2] ) . "' />";

	}

	echo "<meta property='og:type' content='article' />";
	
	//echo "<meta property='og:description' content='" .  wp_trim_words( get_the_content(), 10, '' ) . "' />";

	echo "<meta property='og:description' content='' />";

}

add_action( 'wp_head', 'insert_fb_in_head', 5 );

function insert_facebook_opengraph_for_homepage() {
	
	if ( is_singular() ) return;
	
	if ( is_front_page() ) {
	
		echo "<meta property='og:title' content='" . get_the_title() . "' />";
		
		echo "<meta property='og:site_name' content='" . get_bloginfo( 'name' ) . "' />";
		
		echo "<meta property='og:url' content='" . home_url( '/' ) . "' />";
		
		echo "<meta property='og:description' content='" .  get_bloginfo( 'description', 'show' ) . "' />";
		
		echo "<meta property='og:type' content='article' />";
		
		echo '<meta property="og:image" content="' . get_stylesheet_directory_uri() . "/images/default-thumbnail.png" . '"/>';
		
		echo "<meta property='og:image:type' content='image/jpeg />";

		echo "<meta property='og:image:width' content='1024' />";

		echo "<meta property='og:image:height' content='768' />";
	}
}

add_action( 'wp_head', 'insert_facebook_opengraph_for_homepage', 5 );