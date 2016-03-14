<?php get_header(); ?>	

<div class="outer-container">
    <div class="main-content single">
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

            $pullquote    = get_post_meta( $post->ID, '_pullquote_quote', true );
        ?>

    	<div class="back-to-toc">
            <a href="/resources"><div class="back-toc-arrow">
                <div class="top"></div>
                <div class="bottom"></div>
            </div></a>
    		<p class="table-of-contents"><a href="/resources"> TABLE OF CONTENTS</a></p>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/froggy.png" alt="">
    	</div>
    	<h1 class="blog-title"><?php the_title(); ?></h1>
    	<div class="blog-meta">
    		<p>By: <?php the_author_posts_link(); ?></p>
    		<p><?php the_time('l, F jS, Y') ?></p>
    	</div>
    </div>


    <div class="main-content--narrow blog">
        <?php if ($pullquote) { ?>
        <div class="single-blog-pullquote">
            <?php get_template_part( 'template-part-social' ); ?>
            <blockquote><?php echo $pullquote; ?></blockquote>
        </div>
        <?php } ?>

        <div class="blog-entry">
            <?php the_content(); ?>
        </div>
        
            <div class="prev-next-link">
        
            <?php
            $prev_post = get_previous_post();
            if (!empty( $prev_post )): ?>
                <a class="project-nav__arrow" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                <div class="project-nav__arrow--prev">
                    <div class="top"></div>
                    <div class="bottom"></div>
                </div>
                </a>
            <?php endif; ?>

            <div class="comments__text">
                <p>Thanks for reading!</p>
                <p>What'd ya think?</p>
                <p id="see-comments"><?php comments_number(); ?> </p>
            </div>

            <?php
            $next_post = get_next_post();
            if (!empty( $next_post )): ?>
                <a class="project-nav__arrow" href="<?php echo get_permalink( $next_post->ID ); ?>">
                <div class="project-nav__arrow--next">
                    <div class="top"></div>
                    <div class="bottom"></div>
                </div>
                </a>
            <?php endif; ?>        
        </div>
        <?php comments_template(); ?> 
    </div>

	<?php endwhile; endif; ?>
	
</div>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>