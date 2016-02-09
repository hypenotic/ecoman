<?php get_header(); ?>	


<div class="outer-container blog-index">
	<?php get_sidebar(); ?>
	<div class="main-content-narrow">
		<h2><?php wp_title(''); ?></h2>
		<?php if ( have_posts() ) : ?>

		        <?php
		        // Start the loop.
		        while ( have_posts() ) : the_post(); ?>

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
	<div class="main-content">
		<?php get_template_part( 'template-part-contact-form' ); ?>
	</div>
</div>

<?php get_footer(); ?>