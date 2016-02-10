<section id="responsive-tabs" class="tabs boxes">
	<ul class="responsive-tabs__list">
	<?php $query = new WP_Query( array( 'post_type' => 'service', 'order'   => 'ASC') );

		if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

			<?php 

				$title = get_the_title();
				$prehash = preg_replace("/[^a-zA-Z]/", "", $title);
				$lowercase = strtolower($prehash);
				$hash = $lowercase;

			?>

		    <li>
		        <a href="#<?php echo $hash ?>">
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

		?>

	<div id="<?php echo $hash ?>">
		<?php the_title(); ?><br/>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, debitis! Delectus blanditiis vero sit odit illum officia! Eaque quisquam, quasi, blanditiis veniam ducimus illo atque ex nobis ad cupiditate alias sint fugiat sequi labore nostrum, dignissimos voluptate! Distinctio aliquam eum, nihil a. Eligendi consectetur nulla, reiciendis explicabo alias quidem fugit!
	</div>

	<?php endwhile; endif; ?>

</section>

	


