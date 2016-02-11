<?php /* Template Name: About */ ?>

<?php get_header(); ?>	

<div class="outer-container">
	<div class="main-content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<?php the_content(); ?>

		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>


