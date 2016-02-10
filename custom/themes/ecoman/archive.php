<?php get_header(); ?>	

<div class="outer-container">
<div class="main-content">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="archive__single">
        <h3>
            <a href="<?php the_permalink(); ?> ">
            <?php the_title( ); ?>
            </a>
        </h3>
        <div>
            <?php the_excerpt(); ?>
        </div>
        <p class="read-more">
        	<a href="<?php the_permalink(); ?> ">
            Read more
            </a>
        </p>
    </div>

	<?php endwhile; endif; ?>

	<?php get_template_part( 'template-part-contact-form' ); ?>
</div>
</div>

<?php get_footer(); ?>


