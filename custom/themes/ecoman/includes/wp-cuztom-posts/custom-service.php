<?php //Connect CPT
$args = array(
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-multisite', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'taxonomies' => array('category'),
    'show_in_rest' => true
    );
$projects = register_cuztom_post_type('Service', $args);
$projects->add_meta_box(
    'banner',
    'Hero Banner', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Banner Image',
            'description'   => 'Dimensions 1200px x 800px',
            'type'          => 'image',
        ),
        array(
            'name'          => 'herovid',
            'label'         => 'Video Header',
            'description'   => 'Select a video to appear in the header.',
            'type'          => 'post_select',
            'args'          => array(
                'post_type' => 'video',
                'show_option_none' => "Select a video",
                )
        ),
        array(
            'name'          => 'heading',
            'label'         => 'Banner Text',
            'description'   => 'Enter text',
            'type'          => 'text',
        ),
        array(
            'name'          => 'subheading',
            'label'         => 'Banner Subheading',
            'description'   => 'Enter text',
            'type'          => 'text'  
        )
    )
);

$projects->add_meta_box(
    'blurb',
    'Intro Blurb', 
    array(
        array(
            'name'          => 'blurb',
            'label'         => 'Hero Blurb',
            'description'   => '',
            'type'          => 'textarea',
        )
    )
);


?>