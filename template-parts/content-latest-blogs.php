<section class="<?php echo is_front_page() ? 'blogs py-5' : 'single pb-5' ; ?> ">
    <div class="container">
        
        <?php

            // because it runs on homepage
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        
            $blogs = new WP_Query( array(
                'post_type' => 'post',
                'paged' => $paged,
            ) );
        
            if ( $blogs->have_posts() ) {

                if ( is_front_page() ) {

                    echo '<h2>Blogs</h2>';
                
                }

                $num_posts = $blogs->found_posts;
        
                while ( $blogs->have_posts() ) {
        
                    $blogs->the_post();
        
                    get_template_part('template-parts/content', 'blog' );
        
                }
        
            }
        
            $blogs->wp_reset_postdata();

            // Only if the total posts is greater than 
            // the number of posts per page
            if ( $num_posts > get_option( 'posts_per_page' ) ) {
                echo '<button class="loadmore btn btn-primary">Load More</button>';
            }
        
        ?>

    </div>
</section>