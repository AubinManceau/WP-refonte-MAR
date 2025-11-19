<?php
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

add_action('init', function() {
    remove_post_type_support('page', 'editor');
    remove_post_type_support('date', 'editor');
});

add_action('add_meta_boxes', function() {
    remove_meta_box('authordiv', 'page', 'normal');
    remove_meta_box('commentstatusdiv', 'page', 'normal');
    remove_meta_box('commentsdiv', 'page', 'normal');
    remove_meta_box('revisionsdiv', 'page', 'normal');

    remove_meta_box('authordiv', 'date', 'normal');
    remove_meta_box('commentstatusdiv', 'date', 'normal');
    remove_meta_box('commentsdiv', 'date', 'normal');
    remove_meta_box('revisionsdiv', 'date', 'normal');
});