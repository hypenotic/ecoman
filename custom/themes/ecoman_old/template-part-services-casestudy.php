<?php 
/**
* Template for Videos
* @author Emily Dela Cruz (Hypenotic)
* @example <?php get_template_part( 'template-part-services-casestudy'); ?>
* Dependency: custom-post-testimonial.php
* This template prints out a testimonial and its source.
* Content is managed through a custom post type. 
* Testimonials are added via Wordpress backend by a post select via the cuztom helper.
*/
$cs_id = get_post_meta($post->ID,'_cs_bucket',true); ?>

<?php 
    $args = array(
        'post_type' => 'case_study',
        'tag_id'  => $cs_id
    );
    $cases = new WP_Query( $args ); ?>

<?php if ( $cases->have_posts() ) : while ( $cases->have_posts() ) : $cases->the_post(); 
    
    // $banner     = get_post_meta( $post->ID, '_banner_image', true );
    // $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
    // $heading    = get_post_meta( $post->ID, '_banner_heading', true );
    // $subheading = get_post_meta( $post->ID, '_banner_subheading', true );

?>  
    
    <div class="outer-container">
        <div class="main-content no-shift-right">
            <p>BAM</p>
        </div>
    </div>

<?php endwhile; endif; wp_reset_postdata();?>