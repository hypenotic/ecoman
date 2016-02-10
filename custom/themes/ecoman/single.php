<?php get_header(); ?>	

<div class="outer-container">
<div class="main-content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="back-to-toc">
		<p><a href="/resources">← TABLE OF CONTENTS</a></p>
	</div>
	<h1 class="blog-title"><?php the_title(); ?></h1>
	<div class="blog-meta">
		<p><?php the_author_posts_link(); ?></p>
		<p><?php the_time('l, F jS, Y') ?></p>
	</div>

	<div class="blog-entry">
		<?php the_content(); ?>
	</div>

	<div class="prev-next-link">
    
        <?php
        $prev_post = get_previous_post();
        if (!empty( $prev_post )): ?>
            <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
            <div class="project-nav__arrow project-nav__arrow--prev">
                <p>&lt; Previous</p>
            </div>
            </a>
        <?php endif; ?>
        <?php
        $next_post = get_next_post();
        if (!empty( $next_post )): ?>
            <a href="<?php echo get_permalink( $next_post->ID ); ?>">
            <div class="project-nav__arrow project-nav__arrow--next">
                <p>Next &gt;</p>
            </div>
            </a>
        <?php endif; ?>
        
    </div>

	<?php endwhile; endif; ?>
	<?php get_template_part( 'template-part-contact-form' ); ?>
</div>
	
</div>

<?php get_footer(); ?>