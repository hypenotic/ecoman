<?php

/**
* Enqueue styles
*/

function my_styles() {
	wp_register_style('flickity', 'https://npmcdn.com/flickity@1.1/dist/flickity.min.css');
 	wp_enqueue_style( 'flickity' );
 	wp_register_style('awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
 	wp_enqueue_style( 'awesome' );
	wp_register_style('style', get_template_directory_uri() . '/dist/css/style.css?v=190303-q3fq3f3c3c');
 	wp_enqueue_style( 'style' );
}

add_action('wp_enqueue_scripts', 'my_styles');

?>