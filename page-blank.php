<?php

/*
Template Name: Blank
*/

get_header( 'black' ); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php endwhile; endif; ?>

	<section>
		<article class="overview">
			<h2><?php the_field('intro_text'); ?></h2>
			<?php the_content(); ?>
		</article>
	</section>

<?php get_footer(); ?>
