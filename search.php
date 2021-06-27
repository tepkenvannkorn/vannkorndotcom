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

	<section class="search py-5">
		<div class="container">

			<?php if ( have_posts() ) : ?>

			<?php $num_posts = $GLOBALS['wp_query']->found_posts; ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'vannkorn' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

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
				endif;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</div>
	</section>

<?php
get_footer();
