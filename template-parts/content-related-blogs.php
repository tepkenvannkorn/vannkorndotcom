<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package vannkorn
 */

?>

<?php

	$related_by_tags = true;

	$tags = get_the_tags($post->ID); 

	if ( empty( $tags ) ) {

		$related_by_tags = false; // Pull from Categories instead

	}
	
	if ( $related_by_tags == true ) {

		/* Get 6 Related Articles by Tags */

		$tag_ids = array();
		
		foreach ( $tags AS $individual_tag ) {
		
			$tag_ids[] = $individual_tag->term_id; 
		
		}

		$args = array( 'tag__in' => $tag_ids, 
		
			'post__not_in' => array( $post->ID ), 
			
			'posts_per_page' => 3, 
			
			'ignore_sticky_posts' => 1, 
			
			'orderby' => 'rand' 
		);

		$tag_query = new WP_Query( $args );
			
			if ( $tag_query->have_posts() ) :

			?>

			<div class="related-posts py-5">

				<h2><?php echo __('Related', 'vannkorn'); ?></h2>

				<ul class="py-3">

					<?php
		
						while ( $tag_query->have_posts() ) : $tag_query->the_post(); 
					
						?>
							<li class="pb-3">

								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<?php get_template_part( 'template-parts/content', 'meta' ); ?>

							</li>
						
						<?php
						
						endwhile;

					?>

				</ul>

			</div>

			<?php

		endif; // end have_post();
	
		wp_reset_query();


	} else {

		/* Pull article from the same category */

		$cat = get_the_category( $post->ID );
	
		if ( $cat > 0 ) {
			
			$args = array(

				'post_type' => 'post',

				'category_name' => $cat[0]->slug, // Related by category name

				'post__not_in' => array( $post->ID ),

				'posts_per_page' => 3

			);
			
			$my_query = new WP_Query( $args );
			
			if ( $my_query->have_posts() ) :

				?>

				<div class="related-posts py-5">

					<h2><?php echo __('Related', 'vannkorn'); ?></h2>

						<ul class="py-3">

						<?php
			
							while ( $my_query->have_posts() ) : $my_query->the_post(); 
						
							?>
								<li class="pb-3">

									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<?php get_template_part( 'template-parts/content', 'meta' ); ?>


								</li>
							
							<?php
							
							endwhile;

						?>

					</ul>

				</div>

				<?php

			endif; // end have_post();
		
			wp_reset_query();
		
		}

	}
?>