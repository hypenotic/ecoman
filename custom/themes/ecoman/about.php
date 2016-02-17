<?php /* Template Name: About */ ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_header(); ?>	

<div class="tab-section-wrapper">
	<div class="front-page__circle-icon tab-two">
			
	</div>
	<section class="front-page__intro">
		<div class="outer-container front-page">
			<div class="main-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
</div>

<section class="about__services-cta">
	
</section>

<div class="tab-section-wrapper two">
	<div class="front-page__circle-icon tab-one">
				
	</div>
	<section class="front-page__buckets about">
		<div class="outer-container">
			<h3>Meet Your Team</h3>
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


