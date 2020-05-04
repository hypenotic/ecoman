<?php
include('includes/wp-cuztom-helper/cuztom.php');
//Include post custom posts type. Dependent on /wp-cuztom-helper classes.
include('includes/wp-cuztom-posts/custom-generic.php');
include('includes/wp-cuztom-posts/custom-generic-post.php');
include('includes/wp-cuztom-posts/custom-service.php');
include('includes/wp-cuztom-posts/custom-case-study.php');
include('includes/wp-cuztom-posts/custom-testimonials.php');
include('includes/wp-cuztom-posts/custom-team.php');
// include('includes/wp-cuztom-posts/custom-critters.php');

// MetaBox
include('includes/meta-box/mb-page.php');
include('includes/meta-box/mb-services.php');
include('includes/meta-box/mb-testimonials.php');
include('includes/meta-box/mb-case-study.php');

//Load custom functions
require_once('includes/functions/enqueue-style.php');
require_once('includes/functions/enqueue-script.php');
require_once('includes/functions/analyticstracking.php');
require_once('includes/functions/register-menu.php');
require_once('includes/functions/register-sidebar.php');
require_once('includes/functions/social-share.php');
require_once('includes/functions/cuztom-posts.php');
require_once('includes/functions/TwitterAPIExchange.php');
require_once('includes/functions/add-social-aggregator.php');
require_once('includes/functions/grabfirstimage.php');

//Load shortcodes
require_once('includes/shortcodes/full-width-image.php');
require_once('includes/shortcodes/full-width-quote.php');
require_once('includes/shortcodes/template-bullets.php');
require_once('includes/shortcodes/hanging-punctuation.php');
require_once('includes/shortcodes/incontent-picture.php');
require_once('includes/shortcodes/bigcopy.php');
require_once('includes/shortcodes/bigvid.php');
require_once('includes/shortcodes/tooltip.php');
require_once('includes/shortcodes/vid-picture.php');
require_once('includes/shortcodes/inline-tweet.php');
require_once('includes/shortcodes/sidebar-img-left.php');
require_once('includes/shortcodes/sidebar-img-right.php');


add_theme_support( 'post-thumbnails' ); 

/**
 * Enables the Excerpt meta box in Page edit screen.
 */
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );

// Enable support for SVG files
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Read More

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

// Async/Defer Scripts
/*function to add async to all scripts*/
function js_async_attr($tag){

# Add async to all remaining scripts
return str_replace( ' src', ' defer src', $tag );
}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );

/*** Remove Query String from Static Resources ***/
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

// Add Next/Prev props to  API response
// add_filter( 'rest_prepare_case_study', function( $response, $post, $request ) {
// 	global $post;
// 	// Get the so-called next post.
// 	$next = get_adjacent_post( false, '', false );
// 	// Get the so-called previous post.
// 	$previous = get_adjacent_post( false, '', true );
// 	// Format them a bit and only send id and slug (or null, if there is no next/previous post).
// 	$response->data['next'] = ( is_a( $next, 'WP_Post') ) ? array( "id" => $next->ID, "slug" => $next->post_name ) : null;
// 	$response->data['previous'] = ( is_a( $previous, 'WP_Post') ) ? array( "id" => $previous->ID, "slug" => $previous->post_name ) : null;
// 	return $response;
// }, 10, 3 );

?>