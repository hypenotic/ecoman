<?php
/*
* Post Type: Testimonial
* Dependancies:
* - MetaBox.io (https://metabox.io/) 
* - MB Custom Post Type (https://metabox.io/plugins/custom-post-type/) -> also makes custom taxonimies
* - MB Include/Exclude (https://metabox.io/plugins/meta-box-show-hide/)
* - MB Group (https://metabox.io/plugins/meta-box-group/)
* Details:
* This files constructs the fields for a default WP 'page'.
*/
add_filter( 'rwmb_meta_boxes', 'em_register_testimonial' );
function em_register_testimonial( $meta_boxes ) {
    $prefix = '_em_';
    $meta_boxes[] = array(
        'title'      => __( 'Testimonial Details', 'textdomain' ),
        'post_types' => array( 'Testimonial' ),
        'fields' => array(
            array(
                'id'   => $prefix . 'quote_source_name',
                'name' => __( 'Source', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'   => $prefix . 'quote_source_title',
                'name' => __( 'Source Title', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'name'        => 'Attach to a service:',
                'id'          => $prefix . 'quote_service',
                'type'        => 'post',
                'post_type'   => 'service',
                'field_type'  => 'checkbox_tree',
            ),
        ),
    );
    return $meta_boxes;
}
?>