<?php get_header(); ?>  

<div class="blog_wrapper container">
	<img src="<?php echo get_template_directory_uri(); ?>/src/images/froggy.png" alt="Black and white illustration of a frog." class="-pos-a">
	<?php get_sidebar(); ?>
	<div class="blog_content">
    <h2 id="fade-in-item" class="animated fadeInDown">
        <span class="plain-serif"></span><?php single_cat_title( '', true ); ?><span class="plain-serif"></span>
    </h2>
		<?php if ( have_posts() ) : ?>
		        <?php
		        // Start the loop.
		        while ( have_posts() ) : the_post(); ?>

		            <div class="blog_single -pt2">
		                <h3>
		                    <a href="<?php the_permalink(); ?> ">
		                    <?php the_title( ); ?>
		                    </a>
		                </h3>
		                <div>
		                    <?php the_excerpt(); ?>
		                </div>
		            </div>
		            
		            <?php
		    
		        endwhile;
		    
		    // If no content, include the "No posts found" template.
		    else : ?>
	        	<div class="no-search-results">
	            <?php _e( 'Sorry, no posts matched your criteria. Try another search!' );
	            get_search_form();
	        endif;?>

	        <p class="pagination-links"><?php echo paginate_links( $args ); ?></p>
	</div>
</div>


<!--
<div class="outer-container">
    <div class="main-content">
            <header class="text-only-header">
                <h1>Category:</h1>
                <h2 id="fade-in-item" class="animated fadeInDown">
                    <span class="plain-serif">“</span><?php single_cat_title( '', true ); ?><span class="plain-serif">”</span>
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
-->

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>




