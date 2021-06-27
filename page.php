<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vannkorn
 */

get_header();
?>

	<section class="intro py-5 mb-5">
		<div class="container">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title text-center text-md-start">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		</div>
	</section>

	<section class="single">
		<div class="container">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div>
	</section>

<?php
get_footer();
