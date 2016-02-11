<?php /* Template Name: Services */ ?>

<?php get_header(); ?>	

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="outer-container">
	
	<?php get_template_part( 'template-part-services-tabs' ); ?>

</div>

<div class="services-testimonial">

	<div class="outer-container">

	</div>
	
</div>

<div class="services-case-studies">
	<div class="outer-container">
		<div class="case-studies__left">
			
		</div>
		<div class="case-studies__right">
			
		</div>
	</div>
</div>	

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>


