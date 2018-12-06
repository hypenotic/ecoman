<?php //Generic Modular Content Template for Posts and Pages
function remove_meta_boxes() {
    remove_meta_box('postcustom', 'page', 'normal'); //Custom fields metabox
    remove_meta_box('commentstatusdiv', 'page', 'normal'); //Comments status metabox (discussion)
    remove_meta_box('commentsdiv', 'page', 'normal'); //Comments metabox
    remove_meta_box('trackbacksdiv', 'page', 'normal'); //Trackbacks metabox
    remove_meta_box('authordiv', 'page', 'normal'); //Author metabox
    remove_meta_box('slugdiv', 'page', 'normal'); //Slug metabox
    // remove_meta_box('postexcerpt', 'page', 'normal'); //Excerpt metabox
    remove_meta_box('postimagediv', 'page', 'side'); //Featured image metabox
}
add_action( 'admin_menu' , 'remove_meta_boxes' );
$pages = new Cuztom_Post_Type('page');

$pages->add_meta_box(
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

$pages->add_meta_box(
    'cta',
    'Call to Action', 
    array(
        array(
            'name'          => 'heading',
            'label'         => 'CTA Text',
            'description'   => '',
            'type'          => 'text',
        ),
        array(
            'name'          => 'blink',
            'label'         => 'Button Link',
            'description'   => '',
            'type'          => 'text',
        ),
        array(
            'name'          => 'btext',
            'label'         => 'Button Text',
            'description'   => '',
            'type'          => 'text',
        )
    )
);

$pages->add_meta_box(
    'tabs',
    'Tab Images', 
    array(
        array(
            'name'          => 'tabone',
            'label'         => 'Logo/Icon',
            'description'   => '',
            'type'          => 'image',
        ),
        array(
            'name'          => 'tabtwo',
            'label'         => 'Logo/Icon',
            'description'   => '',
            'type'          => 'image',
        ),
        array(
            'name'          => 'tabthree',
            'label'         => 'Logo/Icon',
            'description'   => '',
            'type'          => 'image',
        )
    )
);

?>