<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vannkorn
 */

get_header();
?>

	<section class="intro py-5 text-center text-lg-start">
		<div class="container">

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop

			wp_reset_postdata();

			?>
		</div>
	</section>

	<?php get_template_part('template-parts/content', 'latest-blogs'); ?>

<?php
get_footer();
