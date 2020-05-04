<?php get_header(); ?>	
<div class="blog_wrapper container">
	<img src="<?php echo get_template_directory_uri(); ?>/src/images/froggy.png" alt="Black and white illustration of a frog." class="-pos-a">
	<?php get_sidebar(); ?>
	<div class="blog_content">
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

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>