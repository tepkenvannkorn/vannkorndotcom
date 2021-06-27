<?php

/**
 * Register a custom post type called "Work".
 *
 * @see get_post_type_labels() for label keys.
 */

/* Work */

function post_type_work() {
    
    $labels = array(
        'name'                  => _x( 'Work', 'Post type general name', 'vannkorn' ),
        'singular_name'         => _x( 'Work', 'Post type singular name', 'vannkorn' ),
        'menu_name'             => _x( 'Work', 'Admin Menu text', 'vannkorn' ),
        'name_admin_bar'        => _x( 'Work', 'Add New on Toolbar', 'vannkorn' ),
        'add_new'               => __( 'Add Work', 'vannkorn' ),
        'add_new_item'          => __( 'Add New Work', 'vannkorn' ),
        'new_item'              => __( 'New Work', 'vannkorn' ),
        'edit_item'             => __( 'Edit Work', 'vannkorn' ),
        'view_item'             => __( 'View Work', 'vannkorn' ),
        'all_items'             => __( 'All Work', 'vannkorn' ),
        'search_items'          => __( 'Search Works', 'vannkorn' ),
        'parent_item_colon'     => __( 'Parent Works:', 'vannkorn' ),
        'not_found'             => __( 'No Works found.', 'vannkorn' ),
        'not_found_in_trash'    => __( 'No Works found in Trash.', 'vannkorn' ),
        'featured_image'        => _x( 'Work Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'vannkorn' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'vannkorn' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'vannkorn' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'vannkorn' ),
        'archives'              => _x( 'Work archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'vannkorn' ),
        'insert_into_item'      => _x( 'Insert into Work', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'vannkorn' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Work', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'vannkorn' ),
        'filter_items_list'     => _x( 'Filter Work list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'vannkorn' ),
        'items_list_navigation' => _x( 'Work list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'vannkorn' ),
        'items_list'            => _x( 'Work list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'vannkorn' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true, // false = Hide in SERP
        'menu_position'      => 5,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'work' ),
        'capability_type'    => 'post',
        'exclude_from_search' => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'menu_icon'   		 => 'dashicons-awards',
        'show_in_rest'       => true,
    );
 
    register_post_type( 'work', $args );
}
 
add_action( 'init', 'post_type_work' );
