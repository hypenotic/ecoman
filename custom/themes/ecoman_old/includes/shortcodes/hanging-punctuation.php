<?php
/**
* Hanging Punctuation 
* @example [hangq]Lorem ipsum dolor blah.[/hangq]
*/
function content_hangq_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(), $atts ) );
	return '<span class="hanging-q">' . do_shortcode($content) . '</span>';
	}
add_shortcode( 'hangq', 'content_hangq_shortcode' );
?>