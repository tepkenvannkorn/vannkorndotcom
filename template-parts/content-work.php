<section class="pb-5">
    <div class="container">

        <div class="work-wrapper">

            <?php
            
                $work = new WP_Query( array(
                    'post_type' => 'work',
                    'posts_per_page' => -1,
                ) );
            
                if ( $work->have_posts() ) {
            
                    while ( $work->have_posts() ) {
            
                        $work->the_post(); ?>

                        <div class="card work mb-5 mb-md-0">
                            <div class="work-preview">
                                <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" data-bs-toggle="modal" data-bs-target="#work-<?php echo $post->ID ?>" title="Click to enlarge">
                                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            
                            <div class="work-detail">
                                
                                <h3><?php the_title() ?></h3>

                                <a href="<?php the_field('project_url'); ?>" target="_blank" class="work-url mb-3"><?php the_field('project_url'); ?></a>
                                
                                <div class="work-text">
                                    <?php echo get_the_content(); ?>
                                </div>
                            
                            </div>

                            <div class="modal fade" id="work-<?php echo $post->ID; ?>" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="img-fluid" alt="<?php the_title(); ?>">
                                        </div>
                                    </div>
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