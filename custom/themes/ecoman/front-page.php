<?php get_header(); ?>	

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php // Get custom meta values 

	// Hero Banner
	$banner     = get_post_meta( $post->ID, '_banner_image', true );
	$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
	$heading    = get_post_meta( $post->ID, '_banner_heading', true );
	$subheading = get_post_meta( $post->ID, '_banner_subheading', true );

	// CTA
	$ctatitle 	= get_post_meta($post->ID,'_cta_heading',true);
	$ctabtn 		= get_post_meta($post->ID,'_cta_btext',true);
	$ctalink 		= get_post_meta($post->ID,'_cta_blink',true);
	
	// Testimonial
	$test_id = get_post_meta($post->ID,'_test_select',true);

	// Buttons/Tabs
	$tabone     = get_post_meta( $post->ID, '_tabs_tabone', true );
	$taboneurl  = wp_get_attachment_image_src( $tabone,'tabs', true );
	$tabtwo     = get_post_meta( $post->ID, '_tabs_tabtwo', true );
	$tabtwourl  = wp_get_attachment_image_src( $tabtwo,'tabs', true );
	$tabthree     = get_post_meta( $post->ID, '_tabs_tabthree', true );
	$tabthreeurl  = wp_get_attachment_image_src( $tabthree,'tabs', true );
?>

<div class="tab-section-wrapper" id="thescroll">
	<div class="front-page__circle-icon tab-one" style="background-image:url(<?php echo $taboneurl[0]; ?>);">
			
	</div>
	<section class="front-page__intro">
		<div class="outer-container front-page">
			<div class="main-content">
				<?php the_content(); ?>
			</div>
		</div>
		<?php if ($ctalink) { ?>
			<a href="<?php echo $ctalink; ?>" class="home-page-cta">
				<button class="copper-btn large-btn white-hover">
					<?php echo $ctabtn; ?>
				</button>
				<img src="<?php echo get_template_directory_uri(); ?>/dist/images/hanging-kit.png" alt="">
			</a>
		<?php } ?>
	</section>
</div>

<div class="tab-section-wrapper two" id="thescroll2">
	<div class="front-page__circle-icon tab-two" style="background-image:url(<?php echo $tabtwourl[0]; ?>);">
				
	</div>
	<section class="front-page__buckets">
		<div class="outer-container">
			<h3>Services</h3>
			<div class="column-4 column-container wow fadeInUp">
				<?php $query = new WP_Query( array( 'post_type' => 'service', 'order'   => 'ASC' ) );
					
					if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
					
						<?php 

							$pockets      = get_post_meta($post->ID,'_pockets',true);

							$title = get_the_title();
							$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
							$lowercase = strtolower($prehash);
							$hash = $lowercase;

						?>
						
						<div class="column-4__single">
							<a href="<?php echo home_url(); ?>/services/#<?php echo $hash; ?>"><h4><?php the_title(); ?></h4></a>
							<ul>
							<?php if($pockets) {
								    foreach($pockets as $pocket) {
							    $heading        = $pocket['_heading'];
							?>
								
									<li><?php echo $heading; ?></li>
								
							<?php
							        }
							    }
							?>
							</ul>
						</div>

				<?php endwhile; endif; ?>
			</div>
			<a href="<?php echo home_url(); ?>/services">
			<button class="copper-btn large-btn center-margin">
				Learn more about our services
			</button>
		</a>
		</div>
	</section>
</div>

<?php if ($test_id) { ?>
<div class="services-testimonial front-page-test" id="scroll3">
	<?php  
	    $args = array(
	        'post_type' => 'testimonial',
	        'post__in'  => array($test_id)
	    );
	    $tquote = new WP_Query( $args ); ?>

	<?php if ( $tquote->have_posts() ) : while ( $tquote->have_posts() ) : $tquote->the_post(); 
	    
	    $quotation      = get_post_meta( $post->ID, '_single_quotation', true );
	    $src            = get_post_meta( $post->ID, '_single_source', true );
	    $srctitle       = get_post_meta( $post->ID, '_single_title', true ); ?>  
	    
	    <div class="outer-container">
	        <div class="main-content wow fadeInLeft">
	            <div class="testimonial-border__circle--top"></div>
	            <p class="uppercase">What clients say when we leave the room</p>
	            <blockquote class="testimonial__quotation">
	                <?php echo $quotation; ?>
	            </blockquote>
	            <div class="testimonial__creds">
	                <p><?php echo $src; ?>
	                <?php if ( $srctitle) { ?>
	                    ,
	                <?php } ?>    
	                <?php echo $srctitle; ?></p>
	            </div> 
	            <div class="testimonial-border__circle--bottom"></div> 
	        </div>
	    </div>

	<?php endwhile; endif;?> 
</div>
<?php } ?>

<?php endwhile; endif; ?>

<?php //get_template_part( 'template-part-contact-form' ); ?>

<div id="scroll4">
	<div class="contact__circle-icon">
				
	</div>
	<div class="full-screen-wrapper contact">
		<div class="outer-container">
			<div class="contact-section">
				<div class="contact-intro">
					<h3>We love hearing from you!</h3>
					<?php dynamic_sidebar( 'contact-blurb' ); ?>
				</div>
				<div class="contact-form">
					<div class="contact-form__left">
						<div class="contact__deats">
							<p>ecoman</p>
							<p>44 shanly street,<br/>
							toronto, on<br/>
							M6H 1S3 <a onclick="trackOutboundLink('https://www.google.ca/maps/place/44+Shanly+St,+Toronto,+ON+M6H+1S3/@43.6637464,-79.4326931,17z/data=!4m2!3m1!1s0x882b34674ae9fbf9:0x25f8e5b90548ccfa'); return false;" href="https://www.google.ca/maps/place/44+Shanly+St,+Toronto,+ON+M6H+1S3/@43.6637464,-79.4326931,17z/data=!4m2!3m1!1s0x882b34674ae9fbf9:0x25f8e5b90548ccfa" target="_blank"><i class="fa fa-map-marker"></i></a></p>
						</div>
						<div class="contact__blurb">
							<p><a onclick="trackOutboundLink('mailto:jonas@ecoman.ca'); return false;" onclick="trackOutboundLink('mailto:jonas@ecoman.ca'); return false;" href="mailto:jonas@ecoman.ca">jonas@ecoman.ca</a><br/>
							<a href="tel:4165565516">416.556.5516</a></p>
						</div>
						<div class="contact__social">
							<ul class="social-share">
			                	<li class="white-btn"><a id="facebook" target="_blank" onclick="ga('send', 'event', 'outbound', 'click', 'https://www.facebook.com/Ecomantoronto');" href="https://www.facebook.com/Ecomantoronto"><i class="fa fa-facebook"></i></a></li>
			                	<li class="white-btn"><a id="twitter" onclick="ga('send', 'event', 'outbound', 'click', 'https://twitter.com/#!/ecomandotca');" href="https://twitter.com/#!/ecomandotca" target="_blank"><i class="fa fa-twitter"></i></a></li>
			                	<li class="white-btn"><a id="instagram" onclick="ga('send', 'event', 'outbound', 'click', 'https://www.instagram.com/ecoman_jonas/');" href="https://www.instagram.com/ecoman_jonas/" target="_blank"><i class="fa fa-instagram"></i></a></li>
			                	<li class="white-btn"><a id="mail" onclick="ga('send', 'event', 'outbound', 'click', 'mailto:jonas@ecoman.ca');" href="mailto:jonas@ecoman.ca" rel="nofollow" target="_blank"><i class="fa fa-envelope-o"></i></i></a></li>
			                </ul>
						</div>
					</div>
					<div class="contact-form__right">
						
						<?php echo do_shortcode( '[contact-form-7 id="28" title="Contact form 1"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>


