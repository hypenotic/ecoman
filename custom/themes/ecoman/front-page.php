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
	</section>
</div>

<div class="tab-section-wrapper two">
	<div class="front-page__circle-icon tab-two">
				
	</div>
	<section class="front-page__buckets">
		<div class="outer-container">
			<h3>Services</h3>
			<div class="column-4 column-container">
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

<?php endwhile; endif; ?>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>


