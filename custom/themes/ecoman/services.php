<?php /* Template Name: Services */ ?>

<?php get_header(); ?>	

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="outer-container">
<!-- <div class="main-content no-top-margin"> -->
	
	<?php get_template_part( 'template-part-services-tabs' ); ?>

	<?php get_template_part( 'template-part-contact-form' ); ?>

<!-- </div> -->	
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>


