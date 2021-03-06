<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vannkorn
 */

get_header();
?>

	<section class="intro py-3">
		<div class="container">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<?php get_template_part('template-parts/content', 'meta'); ?>

			<p class="lead pt-5"><?php echo strip_tags( get_the_excerpt() ); ?></p>

			<div class="ads d-flex">
			<a href="https://www.vultr.com/?ref=8627285-6G" rel="no-follow"><img src="https://www.vultr.com/media/banners/banner_300x250.png" width="300" height="250"></a>
			<p>Ads: Register now via this link to receive $100 credit from Vultr</p>
			</div>

		</div>
	</section>

	<section class="single">
        <div class="container">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				get_template_part( 'template-parts/content', 'related-blogs' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
	</section><!-- #section -->

<?php
get_footer();
