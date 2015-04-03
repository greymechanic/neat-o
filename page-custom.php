<?php

/*
Template Name: Custom
*/

get_header( 'black' ); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php endwhile; endif; ?>

	<section>
		<article class="overview">
			<h2><?php // the_field('intro_text'); ?></h2>
			<?php the_content(); ?>
		</article>
	</section>

	<section>
		<article class="custom">
		<?php
			// get posts
			$posts = get_posts(array(
				'post_type'			=> 'custom',
				'posts_per_page'	=> -1,
				'meta_key'			=> 'order',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'ASC'
			));

			if( $posts ): ?>

			<?php foreach( $posts as $post ): 
				
				setup_postdata( $post )
				
			?>

				<div class="third">
					<figure>
						<?php echo get_the_post_thumbnail( $page->ID, 'medium' ); ?>
					</figure>
					<p class="name"><?php the_title(); ?></h3>
					<h6 class="role"><?php //the_field('role'); ?></h6>
					<h6 class="description"><?php //the_field('description'); ?></h6>
				</div>
				
			<?php endforeach; ?>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

		</article>
	</section>


<?php get_footer(); ?>
