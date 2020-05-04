<?php
/**
* TEMPLATE BULLET within template section of styleguide
* @example [bullet]insert list[/bullet]
*/
function content_tempbullet_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(), $atts ) );
	return '<div class="image-bullet">' . do_shortcode($content) . '</div>';
	}
add_shortcode( 'bullet', 'content_tempbullet_shortcode' );
?>