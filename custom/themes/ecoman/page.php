<?php get_header(); ?>	

<div class="outer-container">
<div class="main-content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php endwhile; endif; ?>
	<?php get_template_part( 'template-part-contact-form' ); ?>
</div>
	
</div>



<?php get_footer(); ?>


