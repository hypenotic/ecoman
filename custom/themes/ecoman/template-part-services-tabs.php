<section id="responsive-tabs" class="tabs boxes grey-background">
	<ul class="responsive-tabs__list">
	<div class="">
		<?php $query = new WP_Query( array( 'post_type' => 'service', 'order'   => 'ASC') );
		
			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		
				<?php 
		
					$title = get_the_title();
					$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
					$lowercase = strtolower($prehash);
					$hash = $lowercase;

					$icon     = get_post_meta( $post->ID, '_icon_image', true );
					$iconurl  = wp_get_attachment_image_src( $icon,'icon', true );
		
				?>
		
			    <li>
			        <a href="#<?php echo $hash; ?>">
			        	<div class="tab-icon" style="background-image:url(<?php echo $iconurl[0]; ?>);">
			        	</div>
			        	<span class="-ls-3"><?php the_title(); ?></span>
			        </a>
			    </li>     
		
		<?php endwhile; endif; ?>
	</div>
	</ul>


	<?php $query = new WP_Query( array( 'post_type' => 'service', 'order'   => 'ASC' ) );
	
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	
		<?php 
	
			$title = get_the_title();
			$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
			$lowercase = strtolower($prehash);
			$hash = $lowercase;


			$image     = get_post_meta( $post->ID, '_blurb_image', true );
			$imageurl  = wp_get_attachment_image_src( $image,'blurb', true );
			$heading    = get_post_meta( $post->ID, '_blurb_heading', true );
			$text = get_post_meta( $post->ID, '_blurb_blurb', true );

			$pockets      = get_post_meta($post->ID,'_pockets',true);

			// Testimonial
            $test       = get_post_meta( $post->ID, '_test_select', true );

            // Case Study
            $cs       = get_post_meta( $post->ID, '_cs_bucket', true );
	
		?>
	

	<div id="<?php echo $hash ?>">

		<div class="grey-background">
			<div class="outer-container">
				<div class="main-content">
					<div class="tabs-panel-intro">
						<div class="tabs-panel__left">
							<img src="<?php echo $imageurl[0]; ?>" alt="">
						</div>
						<div class="tabs-panel__right">
							<h2><?php echo $heading; ?></h2>
							<div><?php echo $text; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="grey-background">
			<div class="outer-container">
				<div class="tabs-panel-pockets">
			
					<?php
					    $theid = get_the_ID();
					?>
			
						<?php 

						// 1666 = consulting
						if ( $theid == 1667 ) { ?>
							<div class="consulting-pocket__single">
								<?php the_content(); ?>
							</div>
						<?php }  else  { ?>
			
							<?php if($pockets) {
							    foreach($pockets as $pocket) {
							
							    $heading        = $pocket['_heading'];
							    $text          = $pocket['_text'];
			
							?>
			
							<div class="service-pocket__single">
							    <h4><?php echo $heading; ?></h4>
							    <p><?php echo $text; ?></p>
							</div>
			
							<?php
							        }
							    }
							?>
							       
						<?php } ?>
					     
				</div>
			</div>
		</div>
		
		<?php if ($test) { ?>
		<div class="services-testimonial">
			<?php get_template_part( 'template-part-testimonial' ); ?> 
		</div>
		<?php } ?> 

		<div class="services-case-studies" id="<?php echo $hash; ?>-case" data-cases="<?php echo $hash; ?>">
			    

		</div>
		

	</div>

	<?php endwhile; endif; ?>

</section>

	


