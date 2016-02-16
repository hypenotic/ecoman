<?php 
/**
* Template for Videos
* @author Emily Dela Cruz (Hypenotic)
* @example <?php get_template_part( 'template-part-testimonial'); ?>
* Dependency: custom-post-testimonial.php
* This template prints out a testimonial and its source.
* Content is managed through a custom post type. 
* Testimonials are added via Wordpress backend by a post select via the cuztom helper.
*/
$test_id = get_post_meta($post->ID,'_test_select',true); ?>

<?php 
    $args = array(
        'post_type' => 'testimonial',
        'post__in'  => array($test_id)
    );
    $tquote = new WP_Query( $args ); ?>

<?php if ( $tquote->have_posts() ) : while ( $tquote->have_posts() ) : $tquote->the_post(); 
    
    $quotation      = get_post_meta( $post->ID, '_single_quotation', true );
    $src            = get_post_meta( $post->ID, '_single_source', true );
    $srctitle       = get_post_meta( $post->ID, '_single_title', true ); ?>  
    
    <div class="outer-container">
        <div class="main-content">
            <div class="testimonial-border__circle--top"></div>
            <p class="uppercase">What clients say when we leave the room</p>
            <blockquote class="testimonial__quotation">
                <?php echo $quotation; ?>
            </blockquote>
            <div class="testimonial__creds">
              <p><?php echo $src; ?>, <?php echo $srctitle; ?></p>
            </div> 
            <div class="testimonial-border__circle--bottom"></div> 
        </div>
    </div>

<?php endwhile; endif; wp_reset_postdata();?>