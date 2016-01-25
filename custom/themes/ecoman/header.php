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
	      kitId: 'omn8cmb',
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

	  ga('create', 'UA-72042036-1', 'auto');
	  ga('send', 'pageview');

	</script>
	<?php wp_head(); ?> 
	<script defer src="//f.vimeocdn.com/js/froogaloop2.min.js"></script>
</head>


<body class="cbp-spmenu-push" data-theid="<?php echo get_the_ID(); ?>" data-type="<?php echo get_post_type(); ?>" data-archive="<?php if (is_archive( 'project' )) { echo 'true'; } else { echo 'false'; }?>">
	
		<?php if (is_front_page()) { ?>
			<nav class="home-header">
				<div class="site-width home-width">
					<p id="default-logo-text">INGENUITY</p>
					<a href="http://www.ingenuity.ca" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/yellow-logo.png" alt="Ingenuity Logo - General Contracting and Design Build" id="home-logo"></a>
					<span class="menu icon" id="default-menu-icon" title="Menu (Esc)" tabindex="0"><span class="lines"></span><span id="nav-menu-text">Menu</span></span>
				</div>
		    	<?php 
				    wp_nav_menu(array(
				      'menu' => 'Main Menu',  
				      'container_id' => 'navigation',
				      'walker' => new Main_Menu_Walker()
				    )); 
		    	?> 
			</nav>
		<?php } else { ?>
			<nav class="default-home-header">
				<div class="site-width default-width">
					<p id="default-logo-text">INGENUITY</p>
					<a href="http://www.ingenuity.ca" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/yellow-logo.png" alt="Ingenuity Logo - General Contacting and Design Build" id="default-logo" ></a>
					<span class="menu icon" id="default-menu-icon" title="Menu (Esc)" tabindex="0"><span class="lines"></span><span id="nav-menu-text">Menu</span></span>
				</div>
	    	<?php 
			    wp_nav_menu(array(
			      'menu' => 'Main Menu',  
			      'container_id' => 'navigation',
			      'walker' => new Main_Menu_Walker()
			    )); 
	    	?> 
			</nav>
		<?php } ?>
	
	<main> 