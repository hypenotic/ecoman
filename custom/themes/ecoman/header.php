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
	<!-- Google Analytics -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-73665508-1', 'auto');
	  ga('send', 'pageview');

	</script>
	<script>
	/**
	* Function that tracks a click on an outbound link in Google Analytics.
	* This function takes a valid URL string as an argument, and uses that URL string
	* as the event label. Setting the transport method to 'beacon' lets the hit be sent
	* using 'navigator.sendBeacon' in browser that support it.
	*/
	var trackOutboundLink = function(url) {
	   ga('send', 'event', 'outbound', 'click', url, {
	     'transport': 'beacon',
	     'hitCallback': function(){document.location = url;}
	   });
	}
	</script>
	<!-- FB -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="Ecoman" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_black.png" />
	<!-- Twitter -->
	
	<?php wp_head(); ?> 
	
</head>


<body>	

	<main class="page">

	<nav class="mobile-navigation">
		<div class="nav__left">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_black.png" alt="">
			</a>
			<p>ECOMAN</p>
		</div>
	</nav>

	<?php if (is_front_page()) { 

	// Hero Banner
	$banner     = get_post_meta( $post->ID, '_banner_image', true );
	$bannerurl  = wp_get_attachment_image_src( $banner,'banner', true );
	$heading    = get_post_meta( $post->ID, '_banner_heading', true );
	$subheading = get_post_meta( $post->ID, '_banner_subheading', true );

	?>

	<?php get_template_part( 'template-part-signup' ); ?>

	<header class="main-header inner-nav" style="background-image:url(<?php echo $bannerurl[0]; ?>);">
		<div class="outer-container nav">
			<nav class="desktop">
				<div class="nav__left desktop">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_black.png" alt="">
					</a>
					<p>ECOMAN<span class="text-disappear">. <a href="tel:+4165565516">416.556.5516</a></span></p>
				</div>
				<div class="nav__right desktop">
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
					<?php get_search_form(); ?>
				</div>
				<?php get_template_part( 'template-part-contact-modal' ); ?> 
			</nav>
		</div>
		<div class="header__text outer-container">
			<h1><span class="white-highlight"><?php echo $heading; ?></span></h1>
	        <?php if ($subheading) { ?>
				<h2><?php echo $subheading; ?></h2>
	        <?php } ?>
		</div>
	</header>

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

	<header class="main-header inner-nav small-header" style="background-image:url(<?php echo $bannerurl[0]; ?>);">
		<div class="outer-container nav">
			<nav class="desktop">
				<div class="nav__left desktop">
					<a href="<?php echo home_url(); ?>">
						<?php if ($theme == 'value2') { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_white.png" alt="">
						<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_black.png" alt="">
						<?php } ?>
					</a>
					<?php if ($theme == 'value2') { ?>
					<p class="light-theme">ECOMAN<span class="text-disappear">. <a href="tel:+4165565516"><span class="white-highlight padded-span">416.556.5516</span></a></span></p>
					<?php } else { ?>
					<p>ECOMAN<span class="text-disappear">. <a href="tel:+4165565516">416.556.5516</a></span></p>
					<?php } ?>
				</div>
				<div class="nav__right desktop">
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
					<?php get_search_form(); ?>
				</div>
				<?php get_template_part( 'template-part-contact-modal' ); ?> 
			</nav>
		</div>

		<?php if ($theme == 'value2') { ?>
		<div class="header__text outer-container animated fadeIn light-theme">
		<?php } else { ?>
		<div class="header__text outer-container animated fadeIn">
		<?php } ?>
			<?php if ($theme == 'value2') { ?>
			<h1 class="left-align-text"><span class="black-highlight"><?php echo $heading; ?></span></h1>
			<?php } else { ?>
			<h1 class="left-align-text"><span class="white-highlight"><?php echo $heading; ?></span></h1>
			<?php } ?>
	        <?php if ($subheading) { ?>
				<?php if ($theme == 'value2') { ?>
				<h2><span class="black-highlight"><?php echo $subheading; ?></span></h2>
				<?php } else { ?>
				<h2><span class="white-highlight"><?php echo $subheading; ?></span></h2>
				<?php } ?>
	        <?php } ?>
	        <?php if ($blurb) { ?>
				<div class="header-blurb">
					<?php echo $blurb; ?>
				</div>
	        <?php } ?>
		</div>
	</header>

	<?php } ?>


	<?php if (is_404()) { ?>

	<?php get_template_part( 'template-part-signup' ); ?>

	<header class="main-header inner-nav error-page" style="background-image:url('<?php echo get_template_directory_uri (); ?>/dist/images/404_image.jpg');" alt="404 image - picture of cows">
		<div class="outer-container nav">
			<nav class="desktop">
				<div class="nav__left desktop">
					<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_white.png" alt=""></a>
					<p class="light-theme">ECOMAN<span class="text-disappear">. <a href="tel:+4165565516">416.556.5516</a></span></p>
				</div>
				<div class="nav__right desktop">
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
					<?php get_search_form(); ?>
				</div>
				<?php get_template_part( 'template-part-contact-modal' ); ?> 
			</nav>
		</div>
		<div class="header__text outer-container">
			<h2><span class="black-highlight">Looks like the cows got out of the barn...</span></h2>
			<p><span class="black-highlight">The page you've requested is not available. Try a search? <a href="#contact">Contact</a> us?</span></p>
			<?php get_search_form(); ?>
			<a href="/"><button class="error-page__btn copper-btn">
					Back to the homepage, please!
				</button></a>
		</div>
	</header>

	<?php } ?>

	
	<?php // For search results, default archive and blog index
		if ( is_search() || is_archive() || is_home() || is_single() || is_page('resources') ) 
	{ ?>

	<?php get_template_part( 'template-part-signup' ); ?>

	<header class="inner-nav">
		<div class="outer-container nav">
			<nav class="desktop">
				<div class="nav__left desktop">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/ecoman_logo_icon_black.png" alt="">
					</a>
					<p>ECOMAN<span class="text-disappear">. <a href="tel:+4165565516">416.556.5516</a></span></p>
				</div>
				<div class="nav__right desktop">
					<?php //get_search_form(); ?>
					<?php 
					    wp_nav_menu(array(
					      'menu' => 'Main Menu',  
					      'container_id' => 'main-menu',
					      'walker' => new Main_Menu_Walker()
					    )); 
					?>
					<?php get_search_form(); ?>
				</div>
				<?php get_template_part( 'template-part-contact-modal' ); ?> 
			</nav>
		</div>
	</header>

	<?php // For search results, default archive and blog index
		if ( is_single() ) 
	{ ?>
	<?php if(social_share()) { social_share();} ?>

	<?php } ?>
	
	<?php } ?>



