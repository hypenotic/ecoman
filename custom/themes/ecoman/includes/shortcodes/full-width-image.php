<?php
/**
* FULL WIDTH IMAGE within interview content
* @example [fullimage]<img src="image.jpg"/>[/fullimage]
*/
function content_fullimage_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(), $atts ) );
	return '<figure class="full-width full-image">' . do_shortcode($content) . '</figure>';
	}
add_shortcode( 'fullimage', 'content_fullimage_shortcode' );
?>