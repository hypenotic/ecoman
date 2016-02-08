<?php

/**
* Register Wordpress sidebar widget
*/

register_sidebar(array(
 	'name' => __( 'Contact Blurb' ),
 	'id' => 'contact-blurb',
 	'description' => __( 'Text for the contact form.' ),
  	'before_widget' => '',
  	'after_widget' => '',
  	'before_title' => '',
  	'after_title' => ''
));

?>
