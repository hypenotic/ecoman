<?php /* Template Name: Services */ ?>

<?php get_header(); ?>	

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	
<?php get_template_part( 'template-part-services-tabs' ); ?>

<?php get_template_part( 'template-part-contact-form' ); ?>

<div id="services-cs">

</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>


