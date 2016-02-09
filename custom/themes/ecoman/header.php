<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	 <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<title><?php bloginfo('name'); ?></title>
	<!-- FONTS -->
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700|Open+Sans:400,300,600,700,700italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>
	<!-- Google Analytics -->
	
	<?php wp_head(); ?> 
	
</head>


<body>	
	<main>

	<?php 

	  // Hero Banner
	  $banner     = get_post_meta( $post->ID, '_banner_image', true );
	  $bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
	  $heading    = get_post_meta( $post->ID, '_banner_heading', true );
	  $subheading = get_post_meta( $post->ID, '_banner_subheading', true );

	if (is_front_page()) { ?>

	<?php get_template_part( 'template-part-signup' ); ?>

	<header class="main-header inner-nav">
		<div class="outer-container nav">
			<nav>
				<div class="nav__left">
					<div></div>
					<p>ECOMAN. 123.456.7890</p>
				</div>
				<div class="nav__right">
					<?php get_search_form(); ?>
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
				</div>
			</nav>
		</div>
		<div class="header__text outer-container">
			<h1><?php echo $heading; ?></h1>
	        <?php if ($subheading) { ?>
				<h2><?php echo $subheading; ?></h2>
	        <?php } ?>
		</div>
		<div class="header__circle-icon">
			
		</div>
	</header>

	<?php } ?>

	<?php if ( is_search() || is_archive() || is_page('Resources') ) { ?>

	<?php get_template_part( 'template-part-signup' ); ?>

	<header class="inner-nav">
		<div class="outer-container nav">
			<nav>
				<div class="nav__left">
					<a href="/">
						<div></div>
					</a>
					<p>ECOMAN. 123.456.7890</p>
				</div>
				<div class="nav__right">
					<?php get_search_form(); ?>
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
				</div>
			</nav>
		</div>
	</header>

	<?php } ?>



