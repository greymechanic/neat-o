<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php endwhile; endif; ?>


	<section>
		<article>
			<?php the_content(); ?>
		</article>
	</section>

<?php }  ?>

<?php get_footer(); ?>