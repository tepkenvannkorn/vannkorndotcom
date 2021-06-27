<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vannkorn
 */

get_header();
?>

	<section class="intro py-5 mb-5">
		<div class="container">
			<header class="page-header">
				<h1 class="entry-title text-center text-md-start"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'vannkorn' ); ?></h1>
			</header><!-- .page-header -->
		</div>
	</section>

	<section class="single">
		<div class="container">

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'vannkorn' ); ?></p>

			</div><!-- .page-content -->
		</div>
	</section>

<?php
get_footer();
