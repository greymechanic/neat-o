<?php get_header('single'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<section>
			<article class="post-intro">
				<h2><?php the_title(); ?></h2>
				<h6><?php the_author_meta('display_name'); ?> - <?php the_tags( '', ', ', ' ' ); ?>  - <?php the_date(); ?></h6>
			</article>
		</section>

		<section>
			<article class="post-content">
				<?php the_content(); ?>
			</article>
		</section>

		<section class="related">
			<article class="blog-list">
				<?php

					$tags = wp_get_post_tags($post->ID);

					if ($tags) {
						$tag_ids = array();

						foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'posts_per_page'=>1, // Number of related posts that will be shown.
							'caller_get_posts'=>1,
							'orderby'=>'rand' // Randomize the posts
						);

						$my_query = new wp_query( $args );
						if( $my_query->have_posts() ) {
							
							while( $my_query->have_posts() ) {
								$my_query->the_post(); 
				?>
				        		<a class="post-link" href="<?php the_permalink(); ?>">
									<div class="post">
										<h6>RELATED POST</h6>
										<h3><?php the_title(); ?></h3>
										<h6><?php the_author_meta('display_name'); ?> - <?php the_tags( '', ', ', ' ' ); ?>  - <?php the_date(); ?></h6>
									</div>
								</a>  

							<?php }
						} 
					}
				?>
				<?php wp_reset_query(); ?>
			</article>
		</section>	

	<?php endwhile; else: ?>

		<section>
			<article>
				<p>Sorry, no posts matched your criteria.</p>
			</article>
		</section>

<?php endif; ?>

<?php get_footer(); ?>
