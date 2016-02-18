<?php get_header(); ?>	


<div class="outer-container">
	<div class="main-content">
		<header class="text-only-header">
			<h1>Search Results:</h1>
			<h2 id="fade-in-item" class="animated fadeInDown">
			    <span class="plain-serif">“</span><?php echo get_search_query(); ?><span class="plain-serif">”</span>
			</h2>
		</header>
		
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
	</div>
</div>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>


