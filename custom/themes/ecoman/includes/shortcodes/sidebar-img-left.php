<?php
/**
* SIDEBAR IMAGE within interview content
* @example [leftsbimg]insert content here[/leftsbimg]
*/
function content_sbimgleft_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(), $atts ) );
	return '<figure class="sidebar-img-left">' . do_shortcode($content) . '</figure>';
	}
add_shortcode( 'leftsbimg', 'content_sbimgleft_shortcode' );
?>