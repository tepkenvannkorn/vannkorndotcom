<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Work
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vannkorn
 */

get_header();
?>

	<section class="intro py-5 mb-3">
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

			endwhile; // End of the loop.
			?>

		</div>
	</section>

	<?php get_template_part( 'template-parts/content', 'work' ); ?>

<?php
get_footer();
