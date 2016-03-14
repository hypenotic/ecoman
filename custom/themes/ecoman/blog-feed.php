<?php
/*
Template Name: Blog Feed   
*/
get_header(); ?>
<!-- Get custom meta values -->
<?php 
    $bannerHeadline     = wpautop(get_post_meta($post->ID,'_banner_heading',true));
    $bannerImageId      = get_post_meta($post->ID, '_banner_image', true);
    $bannerImageUrl     = wp_get_attachment_image_src($bannerImageId,'banner', true);
	if($bannerImageUrl == "") {
		$image=get_bloginfo('template_url')."/dist/images/bg-hero.png";
	} else {
		//$image=$bannerImageUrl[0];
		$image=get_bloginfo('template_url')."/dist/images/bg-hero.png";
	}
	
?>

<div class="outer-container">
<div class="main-content blog-index">
	<h1 class="blog-title"><?php the_title(); ?></h1>
	<div class="back-to-toc">
		<div class="back-toc-arrow">
		    <div class="top"></div>
		    <div class="bottom"></div>
		</div>
		<p><a href="/resources">TABLE OF CONTENTS</a></p>
		<img src="<?php echo get_template_directory_uri(); ?>/dist/images/froggy.png" alt="">
	</div>
</div>
</div>

<div class="outer-container">
	<section role="main" id="isotope-container">
		<div class="post-container">
			<div class="filters button-group js-radio-button-group">
				<div class="secondary">
					<label>Filter:</label>
					<a href="?show=all"     id="show-all"     class="button" data-filter="*">All</a>
					<a href="?show=blog"    id="show-blog"    class="button" data-filter=".blog">Blog</a>
					<a href="?show=facebook"  id="show-facebook"  class="button" data-filter=".facebook">Facebook</a>			
					<a href="?show=instagram"  id="show-instagram"  class="button" data-filter=".instagram">Instagram</a>			
					<a href="?show=twitter"  id="show-twitter"  class="button" data-filter=".twitter">Twitter</a>			
				</div>
<!-- 				<?php 				
					$args = array(
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'hide_empty' => '1',
					); 
					$categories=get_categories($args);
					if($categories) {	
				?>
						<div class="secondary">	
							<label>Blog Categories:</label>
							<?php foreach ($categories as $category) { ?>
							<a href="?show=<?php echo $category->category_nicename;?>" id="show-<?php echo $category->category_nicename;?>" class="button" data-filter=".<?php echo $category->category_nicename;?>"><?php echo $category->name;?></a>
							<?php } ?>
						</div>
				<?php } ?> -->
			</div>
			<div class="isotope">
			<!-- loop starts -->
				<?php 
					// $feeds = array( array('label'=>'twitter','link'=>'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=ecomandotca','filter'=>'social'));
					// $results = json_cached_results($feeds);
					// show_feed_results($results);
	
					// $twitter_feeds=fetch_twitter_feed();
					get_main_results($results);
				?>
				
			<!-- loop ends -->
			</div>
		</div>	
	</section>
</div>
<?php get_footer(); ?>