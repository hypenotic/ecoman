<?php //Connect CPT
$args = array(
    'has_archive'       => true,
    'hierarchical'      => true,
    'show_in_nav_menus' => true,
    'menu_icon'         => 'dashicons-testimonial', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'taxonomies' => array('service'),
    'show_in_rest' => true
    );
$test = register_cuztom_post_type('Testimonial', $args);

$test->add_meta_box(
    'single',
    'Testimonials', 
    array(
        array(
            'name'          => 'quotation',
            'label'         => 'Testimonial',
            'description'   => '',
            'type'          => 'wysiwyg',
        ),
        array(
            'name'          => 'source',
            'label'         => 'Source',
            'description'   => '',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'title',
            'label'         => 'Source Title',
            'description'   => '',
            'type'          => 'text',
            
        ),
        array(
            'name'          => 'service',
            'label'         => 'Service',
            'description'   => '',
            'type'          => 'select',
            'options'       => array(
                        'value1'    => 'Design',
                        'value2'    => 'Maintenance',
                        'value3'    => 'Consulting',
                        'value4'    => 'Art & Installations',
                        'value5'    => 'Other',
                        'value6'    => 'Choose Service'
                    ),
            'default_value' => 'value6'
        )
    )
);
?>