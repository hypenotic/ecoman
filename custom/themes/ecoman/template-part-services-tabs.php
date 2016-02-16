<section id="responsive-tabs" class="tabs boxes">
	<ul class="responsive-tabs__list outer-container">
	<?php $query = new WP_Query( array( 'post_type' => 'service', 'order'   => 'ASC') );

		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

			<?php 

				$title = get_the_title();
				$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
				$lowercase = strtolower($prehash);
				$hash = $lowercase;

			?>

		    <li>
		        <a href="#<?php echo $hash; ?>">
		        	<span><?php the_title(); ?></span>
		        </a>
		    </li>     

	<?php endwhile; endif; ?>
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


		<div class="outer-container">
			<div class="main-content">
				<div class="tabs-panel-intro">
					<div class="tabs-panel__left">
						<img src="<?php echo $imageurl[0]; ?>" alt="">
					</div>
					<div class="tabs-panel__right">
						<h3><?php echo $heading; ?></h3>
						<div><?php echo $text; ?></div>
					</div>
				</div>
			</div>
		</div>

		
		<div class="outer-container">
			<div class="tabs-panel-pockets">
				<?php if($pockets) {
				    foreach($pockets as $pocket) {
				
				    // Get custom meta values    
				    // $singlelogo     = $logo['_logo'];
				    // $logourl        = wp_get_attachment_image_src($singlelogo,'logos', true);
				    $heading        = $pocket['_heading'];
				    $text          = $pocket['_text'];
				?>
				
				    <div class="logo-samples__single">
				        <h4><?php echo $heading; ?></h4>
				        <p><?php echo $text; ?></p>
				    </div>
				            
				<?php
				        }
				    }
				?> 
			</div>
		</div>
		
		<?php if ($test) { ?>
		<div class="services-testimonial">
			<?php get_template_part( 'template-part-testimonial' ); ?> 
		</div>
		<?php } ?> 

		<?php if ($cs) { ?>
		<div class="services-case-studies">
			<?php 
			    $argsss = array(
			        'post_type' => 'case_study',
			        'tax_query' => array(
		        		array(
		        			'taxonomy' => 'service',
		        			'field'    => 'term_id',
		        			'terms'    => array( $cs )
		        		)
			        ),
			    );
			    $cases = new WP_Query( $argsss ); ?>

			<?php if ( $cases->have_posts() ) : while ( $cases->have_posts() ) : $cases->the_post(); 
			    
			    // $banner     = get_post_meta( $post->ID, '_banner_image', true );
			    // $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
			    // $heading    = get_post_meta( $post->ID, '_banner_heading', true );
			    // $subheading = get_post_meta( $post->ID, '_banner_subheading', true );

			?>  
			    
			    <div class="outer-container">
			        <div class="main-content-case-study ">
			            <h1><?php echo the_title(); ?></h1>
			            <div><?php the_content(); ?></div>
			        </div>
			    </div>

			<?php endwhile; endif; wp_reset_postdata();?>
		</div>
		<?php } ?>
		

	</div>

	<?php endwhile; endif; ?>

</section>

	


