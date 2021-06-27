<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vannkorn
 */

?>

<div class="blog">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="excerpt"><?php the_excerpt(); ?></p>

    <?php get_template_part('template-parts/content', 'meta'); ?>
</div>
