<?php
add_filter('xmlrpc_enabled', '__return_false');

foreach (glob(__DIR__ . '/inc/cpt/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__ . '/inc/configuration/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__ . '/inc/menu/*.php') as $file) {
    require_once $file;
}

function marmite_enqueue_assets()
{
    wp_enqueue_style('marmite-style', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'marmite_enqueue_assets');

function marmite_enqueue_scripts() {
    wp_enqueue_script(
        'marmite-js',
        get_template_directory_uri() . '/assets/js/marmite.js',
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'marmite_enqueue_scripts');

function marmite_enqueue_editor_assets(): void
{

    wp_dequeue_style('common');
    wp_dequeue_style('forms');
    wp_dequeue_style('wp-admin');
    wp_enqueue_script(
        'marmite-js',
        get_template_directory_uri() . '/assets/js/marmite.js',
        [],
        false,
        true
    );
    wp_enqueue_style(
        'marmite-editor',
        get_theme_file_uri('/style.css'),
        [],
        filemtime(get_theme_file_path('/style.css'))
    );
}
add_action('enqueue_block_editor_assets', 'marmite_enqueue_editor_assets', 20);
add_theme_support('title-tag');
