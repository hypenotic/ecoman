<?php
/**
* SIDEBAR IMAGE within interview content
* @example [rightsbimg]insert content here[/rightsbimg]
*/
function content_sbimgright_shortcode( $atts, $content = null  ) {
	extract( shortcode_atts( array(), $atts ) );
	return '<figure class="sidebar-img-right">' . do_shortcode($content) . '</figure>';
	}
add_shortcode( 'rightsbimg', 'content_sbimgright_shortcode' );
?>