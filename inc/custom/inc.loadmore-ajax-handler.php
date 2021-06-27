<?php

function vannkorn_loadmore_ajax_handler(){
	
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
	
	
 
	// it is always better to use WP_Query but not here

	$more_posts = new WP_Query($args);

	//print_r( $more_posts->request );
 
	if ( $more_posts->have_posts() ) :
 
		// run the loop
		while( $more_posts->have_posts() ): $more_posts->the_post();
 
			get_template_part('template-parts/content', 'blog');
 
		endwhile;

		wp_reset_postdata();
 
	endif;
	
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'vannkorn_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'vannkorn_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}