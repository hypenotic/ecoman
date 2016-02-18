<div class="outer-container">
	<div class="column-4 column-container about wow fadeInUp">
	<?php $query = new WP_Query( array( 'post_type' => 'team_member', 'order'   => 'ASC') );
	
		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	
			<?php 
	
				$title = get_the_title();
				$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
				$lowercase = strtolower($prehash);
				$hash = $lowercase;

				$icon     = get_post_meta( $post->ID, '_icon_image', true );
				$iconurl  = wp_get_attachment_image_src( $icon,'icon', true );
	
			?>			
	
		    <div class="column-4__single team-members__single">
		    	<h4><?php the_title(); ?></h4>
		        <img src="" alt="">		
		        <div><?php the_content(); ?></div>    
		    </div>     
	
	<?php endwhile; endif; ?>
	</div>
</div>