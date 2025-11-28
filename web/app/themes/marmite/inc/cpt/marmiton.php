<?php
function marmite_register_marmiton_custom_post_type() {
    $labels = [
        'name'                     => __('Marmitons', 'marmite'),
        'singular_name'            => __('Marmiton', 'marmite'),
        'menu_name'                => __('Les marmitons', 'marmite'),
        'name_admin_bar'           => __('Marmiton', 'marmite'),
        'add_new_item'             => __('Ajouter un nouveau marmiton', 'marmite'),
        'new_item'                 => __('Nouveau marmiton', 'marmite'),
        'edit_item'                => __('Modifier le marmiton', 'marmite'),
        'view_item'                => __('Voir le marmiton', 'marmite'),
        'all_items'                => __('Tous les marmitons', 'marmite'),
        'search_items'             => __('Rechercher un marmiton', 'marmite'),
        'not_found'                => __('Aucun marmiton trouvé.', 'marmite'),
        'not_found_in_trash'       => __('Aucun marmiton trouvé dans la corbeille.', 'marmite'),
        'archives'                 => __('Archives des marmitons', 'marmite'),
        'insert_into_item'         => __('Insérer dans le marmiton', 'marmite'),
        'uploaded_to_this_item'    => __('Téléversé dans ce marmiton', 'marmite'),
        'filter_items_list'        => __('Filtrer la liste des marmitons', 'marmite'),
        'items_list_navigation'    => __('Navigation de la liste des marmitons', 'marmite'),
        'items_list'               => __('Liste des marmitons', 'marmite'),
    ];

    register_post_type('marmiton', [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-admin-users',
        'has_archive' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'rewrite' => [
            'slug' => 'la-cour-des-marmitons',
            'with_front' => false
        ],
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'marmite_register_marmiton_custom_post_type');

add_action('acf/init', 'marmite_register_marmiton_acf_fields');
function marmite_register_marmiton_acf_fields() {

    acf_add_local_field_group([
        'key' => 'group_marmiton_fields',
        'title' => 'Champs Marmiton',
        'fields' => [
            [
                'key' => 'field_marmiton_image',
                'label' => 'Photo du marmiton',
                'name' => 'marmiton_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'required' => true,
            ],
            [
                'key' => 'field_marmiton_instrument',
                'label' => 'Instrument du marmiton',
                'name' => 'marmiton_instrument',
                'type' => 'text',
                'required' => true,
            ],
            [
                'key' => 'field_marmiton_bio',
                'label' => 'Biographie du marmiton',
                'name' => 'marmiton_bio',
                'type' => 'textarea',
                'rows' => 4,
                'required' => false,
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'marmiton',
                ],
            ],
        ],
    ]);
}