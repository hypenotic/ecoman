<?php get_header(); ?>	

	
	<?php // Get custom meta values 

		// Hero Banner
		$banner     = get_post_meta( $post->ID, '_banner_image', true );
		$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
		$heading    = get_post_meta( $post->ID, '_banner_heading', true );
		$subheading = get_post_meta( $post->ID, '_banner_subheading', true );
  	
  	?>

	<div class="default-hero project-index">
		    <figure style="background-image: url('<?php echo get_template_directory_uri(); ?>/dist/images/site-default.jpg'); background-size: cover;"></figure>
		    <div class="hgroup animated fadeInDown">
		        <?php if ($heading) { ?>
					<h1><?php echo $heading; ?></h1>
	        	<?php } else { ?>
	        		<h1><?php wp_title(''); ?></h1>
	        	<?php } ?>
		        <?php if ($subheading) { ?>
					<h2><?php echo $subheading; ?></h2>
	        	<?php } ?>
		    </div>
		</div>

	<div class="main-wrapper"> 
		<section class="main-content standard-center"> 


	<?php // The loop starts here 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	?>
	    <?php  
	        $banner_id      = get_post_meta($post->ID, '_blogadd_hero', true);
	        $banner_url     = wp_get_attachment_image_src($banner_id,'blogadd', true);
	    ?>
			
		<?php $url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <?php $category_classes = ''; ?>

        <?php $categories = get_the_terms($post->ID , 'category'); 
        ?>

        <?php if($categories){
            foreach($categories as $category){
                $category_classes .= ' '.$category->slug;
            };
        }; ?>
			

		<div class="blog-single-post wow fadeIn">
			<a href="<?php the_permalink(); ?>">
				<h3 class="blog-single__title"><?php the_title(); ?></h3>
			</a>
			<p class="blog-single__date"> <?php the_time('F j, Y'); ?> </p>
			<?php 
			if ( has_post_thumbnail() ) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

				echo '<img src="' . $large_image_url[0] . '">';
			} else if ($banner_id) { ?>
			<img src="<?php echo $banner_url[0]; ?>" alt="<?php the_title(); ?>">
			<?php } else {} ?>
			<p> <?php the_excerpt(); ?> </p>
			<!-- <div class="blog-single__cats">
				<p>Listed Under:</p> 
				<?php // echo get_the_category_list(); ?>
			</div> -->
		</div>


	<?php endwhile; else : ?>
	  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

		 <p class="pagination-links"><?php echo paginate_links( $args ); ?></p>

		</section> <!-- ARTICLE WRAP ends here -->
	</div> <!-- contentWrapper ends here -->

<?php get_footer(); ?>