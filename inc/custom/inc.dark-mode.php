<?php
/**
 * Enable dark theme mode
 * Forked from https://wordpress.org/plugins/wp-night-mode/
 */
function vannkorn_dark_mode($classes) {
    
    $vannkorn_dark_mode = isset($_COOKIE['vannkornDarkMode']) ? $_COOKIE['vannkornDarkMode'] : '';
    
    //if the cookie is stored..
    if ($vannkorn_dark_mode !== '') {
        
        // Add 'dark-mode' body class
        return array_merge($classes, array('body-dark-mode'));
    
    }
    
    return $classes;

}

add_filter('body_class', 'vannkorn_dark_mode');