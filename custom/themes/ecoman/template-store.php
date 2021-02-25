<?php
/*
Template Name: Store
*/
?>

<?php get_header('store'); ?>

<div class="banner">
<img src="<?php echo get_bloginfo('template_url').'/src/images/bg_balcony.jpg';?>" alt="">
</div>

<h1><?php the_title();?></h1>

<div>

</div>

<?php get_template_part( 'template-part-contact-form' ); ?>
<?php get_footer(); ?>