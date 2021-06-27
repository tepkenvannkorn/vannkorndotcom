<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vannkorn
 */

?>

	<footer class="py-5">
        <div class="container">
            <div class="row">
                <ul class="nav">
                    <?php echo vannkorn_menu('footer-menu'); ?>
                </ul>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>

<?php get_template_part('template-parts/content', 'cookie-consent'); ?>

</body>
</html>