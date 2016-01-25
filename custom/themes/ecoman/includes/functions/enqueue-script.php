<?php

/**
* Enqueue scripts
*/

function my_scripts() {
	wp_enqueue_script('jquery');
	// wp_register_script('flickity', get_template_directory_uri() . '/dist/js/flickity.js', array('jquery'), '', true);
	// wp_enqueue_script( 'flickity' );
	wp_register_script('app', get_template_directory_uri() . '/dist/js/app.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'app' );
	
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );
?>