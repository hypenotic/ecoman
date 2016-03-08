<?php
/**
* Inline Tweet
* @example [tweet]INSERT CONTENT[/tweet]
*/
function tweet_shortcode( $atts, $content = null ) {
	$output = '';

    $clean=rawurlencode(do_shortcode($content));
    $post_link= urlencode(get_permalink());
 
    $output = '<span class="inline-tweet"><a href="http://twitter.com/home?status='.$clean.'+'.$post_link.'+@ecomandotca">'.do_shortcode($content).'<i class="fa fa-twitter"></i></a></span>';
    	
    return $output;
	}
add_shortcode( 'tweet', 'tweet_shortcode' );
?>