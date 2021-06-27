<?php

/**
 * Exclude from the Search Result page
 */

function vannkorn_exclude_from_search( $query ) {

    /* check is front end main loop content */
    if ( is_admin() || ! $query->is_main_query() ) return;

    if ( $query->is_search ) {
        
        $query->set( 'post_type', 'post');
        
    }

}

add_action('pre_get_posts', 'vannkorn_exclude_from_search');