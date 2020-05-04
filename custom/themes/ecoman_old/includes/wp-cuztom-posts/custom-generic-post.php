<?php //Generic Modular Content Template for Posts
$posts = new Cuztom_Post_Type('post');

$posts->add_meta_box(
    'pullquote',
    'Tweetable Pullquote', 
    array(
        array(
            'name'          => 'quote',
            'label'         => 'Intro/Top Pullquote',
            'description'   => 'Appears at the top of the blog post. Keep it around 100 characters if you want the whole thing to show up in the tweet.',
            'type'          => 'textarea',
        )
    )
);
?>