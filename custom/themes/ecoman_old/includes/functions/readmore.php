<?php
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'html5', array( 'search-form' ) );

function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '">...read more.</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>