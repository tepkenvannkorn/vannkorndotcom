<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vannkorn
 */

?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="js/html5shiv.min.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'vannkorn' ); ?></a>

	<?php get_template_part('template-parts/content', 'slidein-menu'); ?>

	<header id="masthead" class="site-header">

		<nav class="navbar navbar-expand-md navbar-light bg-light py-4">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->

				<a href="#" class="mobile-only dark-mode nav-link"><span class="fa fa-moon"></span></a>

				<div class="site-branding">
					<?php
					the_custom_logo();

					echo '<div class="brand-wrapper">';
					
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</h1>
						<?php else : ?>
							<p class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							</p>
						<?php endif;
						
						$vannkorn_description = get_bloginfo( 'description', 'display' );

						if ( $vannkorn_description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $vannkorn_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>

					</div>

				</div><!-- .site-branding -->

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="main-menu">
					<ul class="nav navbar-nav">

						<a href="#" class="web-only dark-mode nav-link"><span class="fa fa-moon"></span></a>
						
						<?php echo vannkorn_menu('primary-menu'); ?>

						<li><a href="#search-modal" class="nav-link" data-lity=""><span class="fas fa-search"></span></a></li>

					</ul>
				</div>
			</div>
		</nav>
		
	</header>