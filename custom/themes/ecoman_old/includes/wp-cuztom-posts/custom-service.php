<?php //Connect CPT
$args = array(
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-multisite', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'taxonomies' => array('category'),
    'show_in_rest' => true
    );
$services = register_cuztom_post_type('Service', $args);
$services->add_meta_box(
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

$services->add_meta_box(
    'icon',
    'Tab Icon', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Tab Icon',
            'description'   => 'Dimensions 150px x 150px',
            'type'          => 'image',
            )
    )
);

$services->add_meta_box(
    'blurb',
    'Intro Blurb', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Image',
            'description'   => 'Dimensions 500px x 500px',
            'type'          => 'image',
            ),
        array(
            'name'          => 'heading',
            'label'         => 'Heading',
            'description'   => '',
            'type'          => 'text',
        ),
        array(
            'name'          => 'blurb',
            'label'         => 'Content',
            'description'   => '',
            'type'          => 'wysiwyg',
        )
    )
);

$services->add_meta_box(
    'pockets',
    'Pockets',
    array(
        'bundle', 
        array(
            array(
                'name'          => 'image',
                'label'         => 'Image',
                'description'   => 'Dimensions 500px x 500px',
                'type'          => 'image',
            ),
            array(
                'name'          => 'heading',
                'label'         => 'Heading',
                'description'   => '',
                'type'          => 'text',
            ),
            array(
                'name'          => 'text',
                'label'         => 'Content',
                'description'   => '',
                'type'          => 'textarea',        
            ),
            array(
                'name'          => 'url',
                'label'         => 'Link',
                'description'   => '',
                'type'          => 'text',      
            )
        )
    )
);

$services->add_meta_box(
    'test',
    'Testimonial <i>(Optional)</i>',
    array(
        array(
        'name'          => 'select',
        'label'         => 'Select a testimonial',
        'description'   => '',
        'type'          => 'post_select',
        'args'          => array(
            'post_type' => 'testimonial',
            'show_option_none' => "Select a testimonial",
            )
        )
    )
);

// $services->add_meta_box(
//     'cs',
//     'Case Studies <i>(Optional)</i>',
//     array(
//         array(
//         'name'          => 'select',
//         'label'         => 'Select Case Studies',
//         'description'   => '',
//         'type'          => 'post_select',
//         'args'          => array(
//             'post_type' => 'case_study',
//             'show_option_none' => "Select Case Studies",
//             )
//         ),
//         array(
//         'name'          => 'bucket',
//         'label'         => 'Select a service category',
//         'description'   => '',
//         'type'          => 'term_select',
//         'args'          => array(
//             'taxonomy' => 'service',
//             'show_option_none' => "Service Category",
//             )
//         )
//     )
// );

?>