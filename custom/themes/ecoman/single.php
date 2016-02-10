<?php get_header(); ?>	

<div class="outer-container">
<div class="main-content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><?php the_title(); ?></h1>
	<p><?php the_author_posts_link(); ?></p>
	<p><?php the_time('l, F jS, Y') ?></p>

	<?php the_content(); ?>

	<?php endwhile; endif; ?>
	<?php get_template_part( 'template-part-contact-form' ); ?>
</div>
	
</div>

<?php get_footer(); ?>