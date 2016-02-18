<div class="outer-container">
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
	
		    <div class="team-members__single">
		        <img src="" alt="">		
		        <div></div>    
		    </div>     
	
	<?php endwhile; endif; ?>
</div>