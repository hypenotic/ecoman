<?php //Connect CPT
$args = array(
    'has_archive' => true,
    'menu_icon' => 'dashicons-format-image', //http://melchoyce.github.io/dashicons/
    'supports'  => array( 'title', 'editor', 'page-attributes' ),
    'show_in_rest' => true
    );
$crit = register_cuztom_post_type('Critter', $args);

$crit->add_meta_box(
    'critter',
    'Critter', 
    array(
        array(
            'name'          => 'image',
            'label'         => 'Image',
            'description'   => 'Dimensions 500px x 500px',
            'type'          => 'image',
            ),
        array(
            'name'          => 'name',
            'label'         => 'Name',
            'description'   => '',
            'type'          => 'text',
        )
    )
);

?>