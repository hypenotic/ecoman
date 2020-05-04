<?php
/**
* FULL WIDTH QUOTATION within interview content
* @example [fullquote]insert quote here[/fullquote]
*/
function content_fullquote_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(), $atts ) );
	return '<div class="full-width full-quote">' . do_shortcode($content) . '</div>';
	}
add_shortcode( 'fullquote', 'content_fullquote_shortcode' );
?>