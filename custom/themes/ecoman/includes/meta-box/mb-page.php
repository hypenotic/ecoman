<?php
/*
* Post Type: Page (Default)
* Dependancies:
* - MetaBox.io (https://metabox.io/) 
* - MB Custom Post Type (https://metabox.io/plugins/custom-post-type/) -> also makes custom taxonimies
* - MB Include/Exclude (https://metabox.io/plugins/meta-box-show-hide/)
* - MB Group (https://metabox.io/plugins/meta-box-group/)
* Details:
* This files constructs the fields for a default WP 'page'.
*/
add_filter( 'rwmb_meta_boxes', 'em_register_default' );
function em_register_default( $meta_boxes ) {
    $prefix = '_em_';
    // ALL PAGES
    $meta_boxes[] = array(
        'title'      => __( 'Banner', 'textdomain' ),
        'post_types' => array( 'page'),
        'fields' => array(
            array(
               'id'   => '_banner_heading',
               'name' => __( 'Heading', 'textdomain' ),
               'type' => 'text',
            ),
            array(
               'id'   => '_banner_subheading',
               'name' => __( 'Subheading', 'textdomain' ),
               'type' => 'textarea',
            ),
            array(
               'id'   => $prefix . 'banner_cta',
               'name' => __( 'Button Text', 'textdomain' ),
               'type' => 'text',
            ),
            array(
                'id'   => $prefix . 'banner_link',
                'name' => __( 'Button Link', 'textdomain' ),
                'type' => 'text',
             )
        ),
    );
    $meta_boxes[] = array(
        'title'      => __( 'Intro', 'textdomain' ),
        'post_types' => array( 'page'),
        'include' => array(
            'template'  => array( 'services.php','page-home.php', 'about.php' )
        ),
        'fields' => array(
            array(
                'id'   => $prefix . 'intro_heading',
                'name' => __( 'Intro Heading', 'textdomain' ),
                'type' => 'text',
            ),
            array(
               'id'   => $prefix . 'intro_text',
               'name' => __( 'Intro Content', 'textdomain' ),
               'type' => 'wysiwyg',
            ),
            array(
                'id'   => $prefix . 'intro_image',
                'name' => __( 'Intro Image', 'textdomain' ),
                'type' => 'image_advanced',
            )
        ),
    );
    // About
    $meta_boxes[] = array(
        'title'      => __( 'Team', 'textdomain' ),
        'post_types' => array( 'page'),
        'include' => array(
            'template'  => array( 'about.php' )
        ),
        'fields' => array(
            array(
                'id'   => $prefix . 'team_image',
                'name' => __( 'Team Image', 'textdomain' ),
                'type' => 'image_advanced',
            )
        ),
    );
    return $meta_boxes;
}
?>