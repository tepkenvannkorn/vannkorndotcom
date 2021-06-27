<section class="pb-5">
    <div class="container">

        <div class="work-wrapper">

            <?php

                // because it runs on homepage
                $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            
                $work = new WP_Query( array(
                    'post_type' => 'work',
                    'posts_per_page' => -1,
                ) );
            
                if ( $work->have_posts() ) {
            
                    while ( $work->have_posts() ) {
            
                        $work->the_post(); ?>

                        <div class="card work mb-5 mb-md-0">
                            <div class="work-preview">
                                <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" data-lity data-title="<?php the_title(); ?>" title="Click to enlarge">
                                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            
                            <div class="work-detail">
                                
                                <h3><?php the_title() ?></h3>

                                <a href="<?php the_field('project_url'); ?>" target="_blank" class="work-url mb-3"><?php the_field('project_url'); ?></a>
                                
                                <div class="work-text">
                                    <?php the_content(); ?>
                                </div>
                            
                            </div>

                        </div>
            
                    <?php }
            
                }
            
                $work->wp_reset_postdata();
            
            ?>

        </div>

    </div>
</section>