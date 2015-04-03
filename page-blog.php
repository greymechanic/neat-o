<?php

/*
Template Name: Blog
*/

get_header( 'blog' ); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php endwhile; endif; ?>

	<section>
		<article class="overview">
			<h2><?php //the_field('intro_text'); ?></h2>
			<p class="center links">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>/">One</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>/">Two</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>/">Three</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>/">Four</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>/">Five</a>
			</p>
		</article>
	</section>
	
	<section>
		<article class="blog-list">
			<?php
					query_posts(array(
							'showposts' => -1,
							'order' => 'ASC'
					) );
			?>
			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>
					<a class="post-link" href="<?php the_permalink(); ?>">
						<div class="post">
							<h3><?php the_title(); ?></h3>
							<h6><?php the_author_meta('display_name'); ?> - <?php the_tags( '', ', ', ' ' ); ?>  - <?php the_date(); ?></h6>
						</div>
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</article>
	</section>

<?php get_footer(); ?>
