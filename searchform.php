<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ouchrov
 */
?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search <?php echo ( is_404() || is_search() ) ? 'onpage-search' : '' ?>" method="get">
	<div class="form-group">
		<input type="text" id="searchControl" class="form-control" name="s" placeholder="Search..." value="<?php echo get_search_query(); ?>">
		<button type="submit">Search</button>
	</div>
	<button class="close"><i class="fa fa-times"></i></button>
</form>
