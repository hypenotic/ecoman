<?php /* Template Name: Home */ ?>
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

<section class="home_intro -pos-r -ptb-default" style="background-image: url(<?php echo get_template_directory_uri(); ?>/src/images/accent_1.jpg);">
    <div class="container">
        <div class="container_inner -flex -flex-jc-sb">
            <div class="-flex-half">
                <img src="<?php echo $introImageURL;?>" alt="<?php echo $introImageAlt;?>">
            </div>
            <div class="-flex-half">
                <h3 class="-uppercase -ls-3"><?php echo $introHeading; ?></h3>
                <?php echo $introContent; ?>
            </div>
        </div>
        <div class="home_services -ptb-default">
            <h3 class="-uppercase -ls-3 -ta-center -mb-small">Services</h3>
            <div class="column-4 column-container wow fadeInUp">
                <?php $query = new WP_Query( array( 'post_type' => 'service', 'order'   => 'ASC' ) );
                    
                    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                    
                        <?php
                            $icon       = get_post_meta($post->ID,'_icon_image',true);
                            $iconurl  = wp_get_attachment_image_src( $icon,'icon', true ); 
                            $pockets    = get_post_meta($post->ID,'_pockets',true);
                            $title      = get_the_title();
                            $prehash    = preg_replace("/[^a-zA-Z]/", "", $title);
                            $lowercase  = strtolower($prehash);
                            $hash       = $lowercase;
                        ?>
                        
                        <div class="column-4__single">
                        <div class="heading -flex -flex-ai-c">
                            <img src="<?php echo $iconurl[0]; ?>" alt="">
                            <h4 class="-sans-serif"><?php the_title(); ?></h4>
                        </div>
                            <ul class="-lst-none">
                            <?php if($pockets) {
                                    foreach($pockets as $pocket) {
                                $heading        = $pocket['_heading'];
                            ?>
                                
                                    <li><a href="<?php echo home_url(); ?>/services/#<?php echo $hash; ?>" class="-serif -italic"><?php echo $heading; ?></a></li>
                                
                            <?php
                                    }
                                }
                            ?>
                            </ul>
                        </div>

                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
    <a href="<?php echo home_url(); ?>/services" class="btn -bg-green -pos-a">Read up on our services</a>
</section>

<?php if ($test_id) { ?>
<div class="services-testimonial front-page-test">
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
            <div class="main-content wow fadeInLeft">
                <div class="testimonial-border__circle--top"></div>
                <p class="uppercase">What clients say when we leave the room</p>
                <blockquote class="testimonial__quotation">
                    <?php echo $quotation; ?>
                </blockquote>
                <div class="testimonial__creds">
                    <p><?php echo $src; ?>
                    <?php if ( $srctitle) { ?>
                        ,
                    <?php } ?>    
                    <?php echo $srctitle; ?></p>
                </div> 
                <div class="testimonial-border__circle--bottom"></div> 
            </div>
        </div>

    <?php endwhile; endif;?> 
</div>
<?php } ?>

<?php endwhile; endif; ?>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>