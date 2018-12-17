<?php
/*
* Post Type: Service (Default)
* Dependancies:
* - MetaBox.io (https://metabox.io/) 
* - MB Custom Post Type (https://metabox.io/plugins/custom-post-type/) -> also makes custom taxonimies
* - MB Include/Exclude (https://metabox.io/plugins/meta-box-show-hide/)
* - MB Group (https://metabox.io/plugins/meta-box-group/)
* Details:
* This files constructs the fields for a default WP 'page'.
*/
add_filter( 'rwmb_meta_boxes', 'em_register_service' );
function em_register_service( $meta_boxes ) {
    $prefix = '_em_';
    $meta_boxes[] = array(
        'title'      => __( 'Service Details', 'textdomain' ),
        'post_types' => array( 'service' ),
        'fields' => array(
            array(
                'id'   => $prefix . 'service_intro_heading',
                'name' => __( 'Intro Heading', 'textdomain' ),
                'type' => 'text',
            ),
            array(
               'id'   => $prefix . 'service_intro_text',
               'name' => __( 'Intro Content', 'textdomain' ),
               'type' => 'wysiwyg',
            ),
            array(
                'id'   => $prefix . 'service_intro_image',
                'name' => __( 'Intro Image', 'textdomain' ),
                'type' => 'image_advanced',
            ),
            array(
                'id'   => $prefix . 'service_icon_file',
                'name' => __( 'Icon (White)', 'textdomain' ),
                'type' => 'image_advanced',
            ),
            array(
                'id'   => $prefix . 'service_icon_file_b',
                'name' => __( 'Icon (Black)', 'textdomain' ),
                'type' => 'image_advanced',
            ),
        ),
    );
    $meta_boxes[] = array(
        'title'      => __( 'Buckets', 'textdomain' ),
        'post_types' => array( 'service'),
        'fields' => array(
            array(
                'id'     => $prefix . 'buckets',
                'type'   => 'group',
                'clone'  => true,
                'sort_clone' => true,
                // Sub-fields
                'fields' => array(
                    array(
                        'name' => 'Heading',
                        'id'   => $prefix . 'bucket_heading',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Content',
                        'id'   => $prefix . 'bucket_content',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
    );
    return $meta_boxes;
}
?>