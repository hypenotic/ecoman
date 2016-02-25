<?php get_header(); ?>	

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php // Get custom meta values 

	// Hero Banner
	$banner     = get_post_meta( $post->ID, '_banner_image', true );
	$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
	$heading    = get_post_meta( $post->ID, '_banner_heading', true );
	$subheading = get_post_meta( $post->ID, '_banner_subheading', true );

	// CTA
	$ctatitle 	= get_post_meta($post->ID,'_cta_heading',true);
	$ctabtn 		= get_post_meta($post->ID,'_cta_btext',true);
	$ctalink 		= get_post_meta($post->ID,'_cta_blink',true);

	// Testimonial
	$test       = get_post_meta( $post->ID, '_test_select', true );
	
?>

<div class="tab-section-wrapper">
	<div class="front-page__circle-icon tab-one">
			
	</div>
	<section class="front-page__intro">
		<div class="outer-container front-page">
			<div class="main-content">
				<?php the_content(); ?>
			</div>
		</div>
		<?php if ($ctalink) { ?>
			<a href="<?php echo $ctalink; ?>" class="home-page-cta">
				<button class="copper-btn large-btn white-hover">
					<?php echo $ctabtn; ?>
				</button>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/images/hanging-cat.png" alt="">
			</a>
		<?php } ?>
	</section>
</div>

<div class="tab-section-wrapper two">
	<div class="front-page__circle-icon tab-two">
				
	</div>
	<section class="front-page__buckets">
		<div class="outer-container">
			<h3>Services</h3>
			<div class="column-4 column-container wow fadeInUp">
				<div class="column-4__single">
					
				</div>
				<div class="column-4__single">
					
				</div>
				<div class="column-4__single">
					
				</div>
				<div class="column-4__single">
					
				</div>
			</div>
		</div>
	</section>
</div>

<?php if ($test) { ?>
<div class="services-testimonial">
	<?php get_template_part( 'template-part-testimonial' ); ?> 
</div>
<?php } ?> 

<?php endwhile; endif; ?>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>


