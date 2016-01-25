<?php 

// https://bay-a.co.uk/wordpress-tips/wp-api-v2-tips/
// https://github.com/WP-API/WP-API/blob/develop/lib/endpoints/class-wp-rest-posts-controller.php (serach for 'rest_prepare')

// ==================== PROJECT CUSTOM POST

add_filter( 'rest_prepare_project', 'add_project_meta_to_json', 10, 3 );
function add_project_meta_to_json($data, $post, $request){

$response_data = $data->get_data();

if ( $request['context'] !== 'view' || is_wp_error( $data ) ) {
    return $data;
}

// Hero Banner
$banner 	= get_post_meta( $post->ID, '_banner_image', true );
$bannerurl 	= wp_get_attachment_image_src( $banner,'banner', true );
$heading = get_post_meta( $post->ID, '_banner_heading', true );
$subheading = get_post_meta( $post->ID, '_banner_subheading', true );

// Hero Blurb
$blurb 		= get_post_meta( $post->ID, '_blurb_heroblurb', true );

// Stats
$client 	= get_post_meta( $post->ID, '_stats_client', true );
$sqft	 	= get_post_meta( $post->ID, '_stats_sf', true );
$budget 	= get_post_meta( $post->ID, '_stats_budget', true );
$duration 	= get_post_meta( $post->ID, '_stats_duration', true );
$location 	= get_post_meta( $post->ID, '_stats_location', true );

// Video
$video 		= get_post_meta( $post->ID, '_video_select', true );

// Testimonial
$test 		= get_post_meta( $post->ID, '_testimonial_select', true );


// if(empty($blurb)){
//     $blurb 		= '';
// }
// if(empty($banner)){
//     $bannerurl 	= '';
// }

if($post->post_type == 'project'){
    $response_data['cuztom_post_meta'] = array(
    	// Hero Banner
        'banner'		=> $banner,
        'bannerimg' 	=> $bannerurl[0],
        'heading'		=> $heading,
        'subheading'	=> $subheading,
        // Hero Blurb
        'blurb' 		=> $blurb,
        // Stats
        'client' 		=> $client,
        'sqft'	 		=> $sqft,
        'budget' 		=> $budget,
        'duration' 		=> $duration,
        'location' 		=> $location,
        // Video
        'video'		 	=> $video,
        // Testimonial
        'testimonial' 	=> $test,
    );  
}

$data->set_data( $response_data );

return $data;
}

// ==================== VIDEO CUSTOM POST

add_filter( 'rest_prepare_video', 'add_video_meta_to_json', 10, 3 );
function add_video_meta_to_json($data, $post, $request){

$response_data = $data->get_data();

if ( $request['context'] !== 'view' || is_wp_error( $data ) ) {
    return $data;
}

// Grab Meta
$vimeo 		= get_post_meta( $post->ID, '_video_vimeo', true );
$descrip 	= get_post_meta( $post->ID, '_video_description', true );

if($post->post_type == 'video'){
    $response_data['cuztom_post_meta'] = array(
        'vimeo'			=> $vimeo,
        'description' 	=> $descrip,
    );  
}

$data->set_data( $response_data );

return $data;
}

// ==================== TESTIMONIAL CUSTOM POST

add_filter( 'rest_prepare_testimonial', 'add_quote_meta_to_json', 10, 3 );
function add_quote_meta_to_json($data, $post, $request){

$response_data = $data->get_data();

if ( $request['context'] !== 'view' || is_wp_error( $data ) ) {
    return $data;
}

// Grab Meta
$quote 		= get_post_meta( $post->ID, '_single_quotation', true );
$src 		= get_post_meta( $post->ID, '_single_source', true );
$srctitle	= get_post_meta( $post->ID, '_single_title', true );

if($post->post_type == 'testimonial'){
    $response_data['cuztom_post_meta'] = array(
        'quote'			=> $quote,
        'source' 		=> $src,
        'source_title' 	=> $srctitle,
    );  
}

$data->set_data( $response_data );

return $data;
}

// ==================== GALLERY CUSTOM POST

?>