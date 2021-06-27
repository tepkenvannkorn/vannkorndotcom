<?php

function vannkorn_menu( $menu_name ) {
	
	$args = array(
		'theme_location'  => $menu_name,
		'menu'            => '',
		'container'       => false,
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => 'bs4navbar',
		'menu_class'      => 'navbar-nav mr-auto',
		'menu_id'         => '',
		'echo'            => false,
		'fallback_cb'     => 'bootstrap_5_wp_nav_menu_walker::fallback',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 2,
		'fallback_cb'     => 'bootstrap_5_wp_nav_menu_walker::fallback',
		'walker'          => new bootstrap_5_wp_nav_menu_walker()
	);
	
	$menu = wp_nav_menu( $args );
	return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}