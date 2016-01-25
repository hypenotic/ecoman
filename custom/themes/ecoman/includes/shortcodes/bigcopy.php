<?php
/**
* Bigger Body Copy
* @example [bigcopy]insert text here[/bigcopy]
*/
function bigcopy_shortcode( $atts, $content = null  ) {
	return '<div class="bigcopy">' . do_shortcode($content) . '</div>';
	}
add_shortcode( 'bigcopy', 'bigcopy_shortcode' );
?>