<?php //Generic Modular Content Template for Posts
$posts = new Cuztom_Post_Type('post');

$posts->add_meta_box(
    'pullquote',
    'Main Pullquote', 
    array(
        array(
            'name'          => 'quote',
            'label'         => 'Intro/Top Pullquote',
            'description'   => 'Appears at the top of the blog post.',
            'type'          => 'textarea',
        )
    )
);
?>