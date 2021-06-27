<?php
/**
 * Create a page instances automatically when the theme is activated
 * and assign the template name to their corresponding page templates
 */

// Home Page
if (isset($_GET['activated']) && is_admin()){
  
    $new_page_title = 'Home Page';
    $new_page_content = 'Texts here will show up when this page is shared on social media';
    $new_page_template = 'front-page.php'; //ex. page-custom.php. Leave blank if you don't want a custom page template.
  
    //don't change the code bellow, unless you know what you're doing
  
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    }
}