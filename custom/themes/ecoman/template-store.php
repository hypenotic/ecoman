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

<?php /*echo do_shortcode('[ecwid_product id="301417470" display="addtobag" 
version="2" show_border="0" show_price_on_button="1" center_align="1"]'); */?>

<?php the_content();?>

<div>

</div>

<?php get_template_part( 'template-part-contact-form' ); ?>
<?php get_footer(); ?>