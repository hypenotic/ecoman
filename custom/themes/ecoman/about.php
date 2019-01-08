<?php /* Template Name: About */ ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

// Intro
$introHeading = get_post_meta($post->ID,'_em_intro_heading',true);
$introContent = get_post_meta($post->ID,'_em_intro_text',true);

$teamImage = get_post_meta($post->ID,'_em_team_image',true);
$teamImageURL = wp_get_attachment_url( $teamImage );
$teamImageAlt = get_post_meta( $teamImage, '_wp_attachment_image_alt', true);

// CTA
$ctatitle 	= get_post_meta($post->ID,'_cta_heading',true);
$ctabtn 		= get_post_meta($post->ID,'_cta_btext',true);
$ctalink 		= get_post_meta($post->ID,'_cta_blink',true);

// Highlight
$highlightHeading = get_post_meta($post->ID,'_em_highlight_heading',true);
$highlightContent = get_post_meta($post->ID,'_em_highlight_text',true);
$highlightImageCap = get_post_meta($post->ID,'_em_highlight_caption',true);
$highlightLink = get_post_meta($post->ID,'_em_highlight_link',true);
$highlightLinkLabel = get_post_meta($post->ID,'_em_highlight_link_label',true);
$highlightImageLink = get_post_meta($post->ID,'_em_highlight_image_link',true);

$highlightImage = get_post_meta($post->ID,'_em_highlight_image',true);
$highlightImageURL = wp_get_attachment_url( $highlightImage );
$highlightImageAlt = get_post_meta( $teamImage, '_wp_attachment_image_alt', true);
?>

<?php get_header(); ?>	

<section class="about-intro -ptb-default">
	<div class="container -ta-center">
		<h3 class="-uppercase -ls-3"><?php echo $introHeading; ?></h3>
		<div><?php echo $introContent; ?></div>
	</div>
</section>

<section class="about-refs -ptb-default">
	<div class="container">
		<h3 class="-uppercase -ls-3 -ta-center">Get to know your yard</h3>
		<div class="inner -flex -flex-jc-sb">
		<?php 
		$args = array( 'post_type' => 'post', 'order'   => 'ASC', 'category_name' => 'reference' );
		$query = new WP_Query( $args );
                    
			if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
				$theID = get_the_ID();
				$imageID = get_post_thumbnail_id( $theID );
				$imageURL = wp_get_attachment_url( $imageID );
				$imageAlt = get_post_meta( $imageID, '_wp_attachment_image_alt', true);
			?>
				
				<div class="-flex-third">
					<img src="<?php echo $imageURL;?>" alt="<?php echo $imageAlt;?>">
					<h4><?php the_title();?></h4>
					<p><?php echo get_the_excerpt(); ?></p>
					<a class="-serif -italic" href="<?php echo get_the_permalink($theID);?>">Learn more</a>
				</div>

		<?php endwhile; wp_reset_postdata(); endif; ?>
		</div>
	</div>
</section>

<section class="about-cs -pt2">
	<h4 class="-uppercase -ls-3 -ta-center">Every project starts with a nature reference</h4>
	
	<div id="services-cs">
	
	</div>
</section>

<section class="about-highlight -pos-r -ptb-default" style="background-image: url(<?php echo get_template_directory_uri(); ?>/src/images/accent_1.jpg);">
    <div class="container">
        <div class="container_inner -flex -flex-jc-sb">
            <div class="-flex-half">
				<?php  if ($highlightImageLink && $highlightImageLink != '')  { ?>
				<a href="<?php echo $highlightImageLink;?>" target="_blank"><img src="<?php echo $highlightImageURL;?>" alt="<?php echo $highlightImageAlt;?>"></a>
				<?php } else { ?>
				<img src="<?php echo $highlightImageURL;?>" alt="<?php echo $highlightImageAlt;?>">
				<?php } ?>
				<span class="-uppercase"><?php echo $highlightImageCap;?></span>
            </div>
            <div class="-flex-half -flex -flex-jc-c -flex-d-c">
				<h4><?php echo $highlightHeading;?></h4>
				<div><?php echo $highlightContent;?></div>
            </div>
        </div>
	</div>
    <a href="<?php echo $highlightLink ?>" class="btn -bg-green -pos-a"><?php echo $highlightLinkLabel ?></a>
</section>

<section class="about-team -bg-dgrey -color-w -ptb-default">
	<div class="container">
		<div class="inner -flex -flex-jc-sb">
			<div class="-flex-half">
			<img src="<?php echo $teamImageURL;?>" alt="<?php echo $teamImageAlt;?>">
			</div>
			<div class="-flex-half">
				<h3 class="-uppercase -ls-3 -color-w" style="margin-bottom: 2rem;">The Team</h3>
				<div class="-flex -flex-jc-sb">
				<?php get_template_part( 'template-part-about-team' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>



<?php endwhile; endif; ?>

<?php get_template_part( 'template-part-contact-form' ); ?>

<?php get_footer(); ?>


