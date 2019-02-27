<?php get_header(); ?>  

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php // Get custom meta values 
    $introHeading = get_post_meta($post->ID,'_em_intro_heading',true);
    $introContent = get_post_meta($post->ID,'_em_intro_text',true);
    $introImage = get_post_meta($post->ID,'_em_intro_image',true);
    $introImageURL = wp_get_attachment_url( $introImage );
    $introImageAlt = get_post_meta( $introImage, '_wp_attachment_image_alt', true);


    // Testimonial
    $test_id = get_post_meta($post->ID,'_test_select',true);
?>

<section class="-pos-r -ptb-default">
    <div class="container">
        <div class="container_inner">
            <?php the_content();?>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>