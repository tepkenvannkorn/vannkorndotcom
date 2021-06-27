<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vannkorn
 */

get_header();?>

<section class="intro py-5 mb-5">
    <div class="container">
        <header class="entry-header">
            <?php echo '<h1 class="entry-title text-center text-md-start">' . __('Blogs', 'vannkorn') . '</h1>'; ?>
        </header><!-- .entry-header -->
    </div>
</section>

<?php

get_template_part('template-parts/content', 'latest-blogs');

get_footer();