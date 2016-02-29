<?php /* Template Name: About */ ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

// CTA
$ctatitle 	= get_post_meta($post->ID,'_cta_heading',true);
$ctabtn 		= get_post_meta($post->ID,'_cta_btext',true);
$ctalink 		= get_post_meta($post->ID,'_cta_blink',true);

?>

<?php get_header(); ?>	

<div class="tab-section-wrapper">
	<div class="front-page__circle-icon tab-two">
			
	</div>
	<section class="front-page__intro about">
		<div class="outer-container">
			<div class="main-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
</div>

<section class="about__services-cta">
	<div class="about__services-cta__photo" style="background-image:url(<?php echo $feat_image; ?>);">
		
	</div>
	<div class="about__services-cta__text wow fadeInRight">
		<h3>What We Do</h3>
		<?php the_excerpt (); ?>
		<a href="<?php echo $ctalink; ?>">
			<button class="copper-btn large-btn">
				<?php echo $ctabtn; ?>
			</button>
		</a>
	</div>
</section>

<div class="tab-section-wrapper two about">
	<div class="front-page__circle-icon tab-one">
				
	</div>
	<section class="front-page__buckets about">
		<div class="outer-container">
			<h3>Meet Your Team</h3>

			<?php get_template_part( 'template-part-about-team' ); ?>

		</div>
	</section>
</div>

<div class="about-case-studies" id="about-case" data-cases="about">
	    
	    <div class="outer-container" data-theid="<?php echo get_the_ID(); ?>" data-type="<?php echo get_post_type(); ?>" data-archive="<?php if (is_archive( 'project' )) { echo 'true'; } else { echo 'false'; }?>">
	        <div class="main-content-case-study" id="about-cs-content">
	            
	        </div>
	        <div id="about-prev" data-casenum="0">
	        	
	        </div>
	        <div id="about-next" data-casenum="0">
	        	
	        </div>
	    </div>

</div>

<?php endwhile; endif; ?>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>


