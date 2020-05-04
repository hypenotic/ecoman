<?php
/*
* Post Type: Case Study
* Dependancies:
* - MetaBox.io (https://metabox.io/) 
* - MB Custom Post Type (https://metabox.io/plugins/custom-post-type/) -> also makes custom taxonimies
* - MB Include/Exclude (https://metabox.io/plugins/meta-box-show-hide/)
* - MB Group (https://metabox.io/plugins/meta-box-group/)
* Details:
* This files constructs the fields for a default WP 'page'.
*/
add_filter( 'rwmb_meta_boxes', 'em_register_cs' );
function em_register_cs( $meta_boxes ) {
    $prefix = '_em_';
    $meta_boxes[] = array(
        'title'      => __( 'Photos', 'textdomain' ),
        'post_types' => array( 'case_study' ),
        'fields' => array(
            array(
                'id'   => $prefix . 'cs_bg_image',
                'name' => __( 'Background Image #1', 'textdomain' ),
                'type' => 'file_input',
            )
        ),
    );
    return $meta_boxes;
}
?>