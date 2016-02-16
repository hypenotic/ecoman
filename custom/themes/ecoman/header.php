<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	 <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<title><?php bloginfo('name'); ?></title>
	<!-- FONTS -->
	<script>
	  (function(d) {
	    var config = {
	      kitId: 'tla7tqi',
	      scriptTimeout: 3000,
	      async: true
	    },
	    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	  })(document);
	</script>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700|Open+Sans:400,300,600,700,700italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Google Analytics -->
	
	<?php wp_head(); ?> 
	
</head>


<body>	
	<main>
	<?php if (is_front_page()) { 

	// Hero Banner
	$banner     = get_post_meta( $post->ID, '_banner_image', true );
	$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
	$heading    = get_post_meta( $post->ID, '_banner_heading', true );
	$subheading = get_post_meta( $post->ID, '_banner_subheading', true );

	?>

	<?php get_template_part( 'template-part-signup' ); ?>

	<header class="main-header inner-nav" style="background:url(<?php echo $bannerurl[0]; ?>);background-size:cover;">
		<div class="outer-container nav">
			<nav>
				<div class="nav__left">
					<a href="/">
						<div></div>
					</a>
					<p>ECOMAN. 123.456.7890</p>
				</div>
				<div class="nav__right">
					<?php //get_search_form(); ?>
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
					<div id="search-form-trigger"></div>
				</div>
			</nav>
		</div>
		<div class="header__text outer-container">
			<h1><span class="white-highlight"><?php echo $heading; ?></span></h1>
	        <?php if ($subheading) { ?>
				<h2><?php echo $subheading; ?></h2>
	        <?php } ?>
		</div>
		<!-- <div class="header__circle-icon">
			
		</div> -->
	</header>

	<?php if(social_share()) { social_share();} ?>

	<?php } ?>


	<?php if ( is_page('about') || is_page('services') ) { 

	// Hero Banner
	$banner     = get_post_meta( $post->ID, '_banner_image', true );
	$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
	$heading    = get_post_meta( $post->ID, '_banner_heading', true );
	$subheading = get_post_meta( $post->ID, '_banner_subheading', true );

	$blurb = get_post_meta( $post->ID, '_banner_blurb', true );

	$theme = get_post_meta( $post->ID, '_banner_theme', true );

	?>



	<?php get_template_part( 'template-part-signup' ); ?>

	<header class="main-header inner-nav small-header" style="background:url(<?php echo $bannerurl[0]; ?>);background-size:cover;">
		<div class="outer-container nav">
			<nav>
				<div class="nav__left">
					<a href="/">
						<div></div>
					</a>
					<p>ECOMAN. 123.456.7890</p>
				</div>
				<div class="nav__right">
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
					<div id="search-form-trigger"></div>
				</div>
			</nav>
		</div>

		<?php if ($theme == 'value2') { ?>
		<div class="header__text outer-container animated fadeIn light-text">
		<?php } else { ?>
		<div class="header__text outer-container animated fadeIn">
		<?php } ?>
			<h1 class="left-align-text"><span class="white-highlight"><?php echo $heading; ?></span></h1>
	        <?php if ($subheading) { ?>
				<h2><?php echo $subheading; ?></h2>
	        <?php } ?>
	        <?php if ($blurb) { ?>
				<div class="header-blurb">
					<?php echo $blurb; ?>
				</div>
	        <?php } ?>
		</div>
	</header>

	<?php if(social_share()) { social_share();} ?>

	<?php } ?>


	<?php if (is_404()) { ?>

	<?php get_template_part( 'template-part-signup' ); ?>

	<header class="main-header inner-nav error-page" style="background:url('/custom/themes/ecoman/dist/images/default_banner.jpg');background-size:cover;">
		<div class="outer-container nav">
			<nav>
				<div class="nav__left">
					<div></div>
					<p>ECOMAN. 123.456.7890</p>
				</div>
				<div class="nav__right">
					<?php //get_search_form(); ?>
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
			<h2>404 Clever Title Sorry</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim voluptates optio iure ipsum quidem, repellat. Saepe sequi est fugit aliquam.</p>
		</div>
		<button class="error-page__btn">
			CTA!
		</button>
	</header>

	<?php if(social_share()) { social_share();} ?>

	<?php } ?>

	
	<?php // For search results, default archive and blog index
		if ( is_search() || is_archive() || is_home() || is_single() ) 
	{ ?>

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
					<?php //get_search_form(); ?>
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
					<div id="search-form-trigger"></div>
				</div>
			</nav>
		</div>
	</header>

	<?php if(social_share()) { social_share();} ?>

	<?php } ?>



