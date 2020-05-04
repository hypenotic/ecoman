<?php
/**
* Tooltip/Footnote
* @example [tooltip number="insert url here"]INSERT CONTENT[/tooltip]
*/
function tooltip_shortcode( $atts, $content = null ) {
	$output = '';
	 
    $tip_atts = shortcode_atts( array(
        'number' => '1'
    ), $atts );
 
    $output .= '<span class="hint--top" data-hint="';
        $output .= do_shortcode($content);
    	$output .= '">';
        $output .= wp_kses_post( $tip_atts[ 'number' ] );
    $output .= '</span>';

    return $output;
	}
add_shortcode( 'tooltip', 'tooltip_shortcode' );
?>