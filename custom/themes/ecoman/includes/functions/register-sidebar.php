<?php

/**
* Register Wordpress sidebar widget
*/

register_sidebar(array(
 	'name' => __( 'Homepage Video' ),
 	'id' => 'homepage-vid',
 	'description' => __( 'Enter the Vimeo video slug.' ),
  	'before_widget' => '',
  	'after_widget' => '',
  	'before_title' => '',
  	'after_title' => ''
));

?>
