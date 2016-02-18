<?php get_header(); ?>  


<div class="outer-container">
    <div class="main-content">
            <header class="text-only-header">
                <h1>Tag:</h1>
                <h2 id="fade-in-item" class="animated fadeInDown">
                    <span class="plain-serif">“</span><?php single_tag_title(); ?><span class="plain-serif">”</span>
                </h2>
            </header>
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
    </div>
</div>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>




