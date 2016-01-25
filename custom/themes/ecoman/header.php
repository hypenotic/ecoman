<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	 <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<title><?php bloginfo('name'); ?></title>
	<!-- FONTS -->
	<!-- Google Analytics -->
	
	<?php wp_head(); ?> 
	
</head>


<body class="cbp-spmenu-push" data-theid="<?php echo get_the_ID(); ?>" data-type="<?php echo get_post_type(); ?>" data-archive="<?php if (is_archive( 'project' )) { echo 'true'; } else { echo 'false'; }?>">
	
		
	
	<main> 