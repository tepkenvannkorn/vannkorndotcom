<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vannkorn
 */

?>

<section class="intro py-5 mb-3 no-results not-found">
	<div class="container">

		<header class="page-header">
			<h1 class="entry-title text-center text-md-start"><?php esc_html_e( 'Nothing Found', 'vannkorn' ); ?></h1>
		</header><!-- .page-header -->

	</div>
</section>

<section class="single">
	<div class="container">


		<div class="page-content pt-3">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'vannkorn' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vannkorn' ); ?></p>
				<?php
				//get_search_form();

			else :
				?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'vannkorn' ); ?></p>
				<?php
				//get_search_form();

			endif;
			?>
		</div><!-- .page-content -->

	</div>
</section><!-- .no-results -->
