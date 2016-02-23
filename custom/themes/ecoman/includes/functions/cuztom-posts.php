<?php 

// https://bay-a.co.uk/wordpress-tips/wp-api-v2-tips/
// https://github.com/WP-API/WP-API/blob/develop/lib/endpoints/class-wp-rest-posts-controller.php (serach for 'rest_prepare')

// ==================== PROJECT CUSTOM POST

add_filter( 'rest_prepare_case_study', 'add_project_meta_to_json', 10, 3 );
function add_project_meta_to_json($data, $post, $request){

$response_data = $data->get_data();

if ( $request['context'] !== 'view' || is_wp_error( $data ) ) {
    return $data;
}

// Before Banner
$before 	= get_post_meta( $post->ID, '_before_image', true );
$beforeurl 	= wp_get_attachment_image_src( $before,'before', true );

if($post->post_type == 'case_study'){
    $response_data['cuztom_post_meta'] = array(
    	// Before Image
        'before'		=> $before,
        'beforeimg' 	=> $beforeurl[0]
    );  
}

$data->set_data( $response_data );

return $data;
}

?>