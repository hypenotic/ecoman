<?php $team_query = new WP_Query( array( 'post_type' => 'team_member', 'order'   => 'ASC') );

	if ( $team_query->have_posts() ) : while ( $team_query->have_posts() ) : $team_query->the_post(); ?>

		<?php 
			$theID = get_the_ID();
		?>			

		<div class="-flex-half">
			<h4><?php the_title(); ?></h4>
			<div><?php the_content(); ?></div>    
		</div>     

<?php endwhile; wp_reset_postdata(); endif; ?>