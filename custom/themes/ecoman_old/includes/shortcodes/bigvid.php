<?php
/**
* Big vid inserted within content
* @example [bigvid vimeoid="insert url here"]
*/
function bigvid_shortcode( $atts ) {
	$output = '';
	 
    $vid_atts = shortcode_atts( array(
        'vimeoid' => 'url'
    ), $atts );
 
    $output .= '<div class="bigvid">';
        $output .= '<iframe src="https://player.vimeo.com/video/' . wp_kses_post( $vid_atts[ 'vimeoid' ] ) . '?portrait=0&title=0&byline=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>' ;
    $output .= '</div>';

    return $output;
	}
add_shortcode( 'bigvid', 'bigvid_shortcode' );
?>