<?php
include('includes/wp-cuztom-helper/cuztom.php');
//Include post custom posts type. Dependent on /wp-cuztom-helper classes.
include('includes/wp-cuztom-posts/custom-generic.php');
include('includes/wp-cuztom-posts/custom-generic-post.php');
include('includes/wp-cuztom-posts/custom-service.php');
include('includes/wp-cuztom-posts/custom-case-study.php');
include('includes/wp-cuztom-posts/custom-testimonials.php');
include('includes/wp-cuztom-posts/custom-team.php');
include('includes/wp-cuztom-posts/custom-critters.php');

// MetaBox
include('includes/meta-box/mb-page.php');

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


// Comments

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

// Modify API Response

// Service Pockets
add_action( 'rest_api_init', 'register_buckets' );
function register_buckets() {
    register_rest_field( 'service',
        '_pockets',
        array(
            'get_callback'    => 'get_buckets',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_buckets( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}

// Service Testimonial
add_action( 'rest_api_init', 'register_service_testimonials' );
function register_service_testimonials() {
    register_rest_field( 'service',
        '_test_select',
        array(
            'get_callback'    => 'get_service_testimonials',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_service_testimonials( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}

// Testimonials
add_action( 'rest_api_init', 'register_test_quote' );
function register_test_quote() {
    register_rest_field( 'testimonial',
        '_single_quotation',
        array(
            'get_callback'    => 'get_test_quote',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_test_quote( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}

add_action( 'rest_api_init', 'register_test_src' );
function register_test_src() {
    register_rest_field( 'testimonial',
        '_single_source',
        array(
            'get_callback'    => 'get_test_src',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_test_src( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}

add_action( 'rest_api_init', 'register_test_srctitle' );
function register_test_srctitle() {
    register_rest_field( 'testimonial',
        '_single_title',
        array(
            'get_callback'    => 'get_test_srctitle',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_test_srctitle( $object, $field_name, $request ) {
    return get_post_meta( $object[ 'id' ], $field_name, true );
}

?>