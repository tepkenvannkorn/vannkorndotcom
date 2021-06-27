<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vannkorn
 */

get_header();
?>

<section class="blogs">
	<div class="container">
		<div class="row">

			<?php if ( have_posts() ) { ?>

				<?php

				$num_posts = $GLOBALS['wp_query']->found_posts;

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'blog' );

				endwhile;

				// Only if the total posts is greater than 
                // the number of posts per page
                if ( $num_posts > get_option( 'posts_per_page' ) ) {
                    echo '<button class="loadmore btn btn-primary">Load More</button>';
                }

			} else {

				get_template_part( 'template-parts/content', 'none' );

			}
			?>

		</div>
	</div>
</section>

<?php
get_footer();
