<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package vannkorn
 */

get_header();
?>

	<?php if ( have_posts() ) : ?>

	<?php $num_posts = $GLOBALS['wp_query']->found_posts; ?>

	<section class="intro py-5 mb-3">
		<div class="container">

			<header class="page-header">
				<h1 class="entry-title text-center text-md-start">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'vannkorn' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

		</div>
	</section>

	<section class="single pt-3 pb-5">
		<div class="container">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			// Only if the total posts is greater than 
			// the number of posts per page
			if ( $num_posts > get_option( 'posts_per_page' ) ) :
				echo '<button class="loadmore btn btn-primary">Load More</button>';
			endif;?>

		</div>
	</section>

	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

<?php
get_footer();
