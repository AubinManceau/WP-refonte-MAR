<?php
function marmite_register_date_custom_post_type() {
    $labels = [
        'name'                     => __('Dates', 'marmite'),
        'singular_name'            => __('Date', 'marmite'),
        'menu_name'                => __('Nos dates', 'marmite'),
        'name_admin_bar'           => __('Date', 'marmite'),
        'add_new_item'             => __('Ajouter une nouvelle date', 'marmite'),
        'new_item'                 => __('Nouvelle date', 'marmite'),
        'edit_item'                => __('Modifier la date', 'marmite'),
        'view_item'                => __('Voir la date', 'marmite'),
        'all_items'                => __('Toutes les dates', 'marmite'),
        'search_items'             => __('Rechercher une date', 'marmite'),
        'not_found'                => __('Aucune date trouvée.', 'marmite'),
        'not_found_in_trash'       => __('Aucune date trouvée dans la corbeille.', 'marmite'),
        'archives'                 => __('Archives des dates', 'marmite'),
        'insert_into_item'         => __('Insérer dans la date', 'marmite'),
        'uploaded_to_this_item'    => __('Téléversé dans cette date', 'marmite'),
        'filter_items_list'        => __('Filtrer la liste des dates', 'marmite'),
        'items_list_navigation'    => __('Navigation de la liste des dates', 'marmite'),
        'items_list'               => __('Liste des dates', 'marmite'),
    ];

    register_post_type('date', [
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-calendar',
        'has_archive' => false,
        'rewrite' => false,
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'marmite_register_date_custom_post_type');

add_action('acf/init', 'marmite_register_date_acf_fields');
function marmite_register_date_acf_fields() {

    acf_add_local_field_group([
        'key' => 'group_date_fields',
        'title' => 'Champs Date d\'événement',
        'fields' => [
            [
                'key' => 'field_date_banner_image',
                'label' => 'Image de couverture',
                'name' => 'date_banner_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'required' => true,
            ],
            [
                'key' => 'field_date_event',
                'label' => 'Date de l\'événement',
                'name' => 'date_event',
                'type' => 'date_picker',
                'required' => true,
            ],
            [
                'key' => 'field_date_description',
                'label' => 'Description',
                'name' => 'date_description',
                'type' => 'textarea',
                'rows' => 4,
                'required' => true,
            ]
        ],

        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'date',
                ],
            ],
        ],
    ]);
}
