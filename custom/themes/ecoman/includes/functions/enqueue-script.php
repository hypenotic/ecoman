<?php

/**
* Enqueue scripts
*/

function my_scripts() {
	wp_enqueue_script('jquery');
	// wp_enqueue_script('jquery-ui-tabs');
	// wp_register_script('tween', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array('jquery'), '', true);
	// wp_enqueue_script( 'tween' );
	// wp_register_script('stellar', get_template_directory_uri() . '/src/js/jquery.stellar.js', array('jquery'), '', true);
	// wp_enqueue_script( 'stellar' );
	wp_register_script('app', get_template_directory_uri() . '/dist/js/app.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'app' );
	
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );
?>