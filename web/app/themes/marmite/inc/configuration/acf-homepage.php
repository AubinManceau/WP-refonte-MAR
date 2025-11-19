<?php
add_action('acf/init', 'marmite_register_homepage_acf_fields');
function marmite_register_homepage_acf_fields() {

    acf_add_local_field_group([
        'key' => 'group_homepage_fields',
        'title' => 'Champs Page d’accueil',
        'fields' => [
            [
                'key' => 'field_home_hero_image',
                'label' => 'Image Hero',
                'name' => 'home_hero_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'required' => true,
            ],
            [
                'key' => 'field_home_title',
                'label' => 'Titre principal',
                'name' => 'home_title',
                'type' => 'text',
                'required' => true,
            ],
            [
                'key' => 'field_home_description',
                'label' => 'Description',
                'name' => 'home_description',
                'type' => 'textarea',
                'rows' => 4,
                'required' => true,
            ],
            [
                'key' => 'field_home_video',
                'label' => 'Vidéo',
                'name' => 'home_video',
                'type' => 'url',
                'instructions' => 'Lien vers une vidéo YouTube',
                'required' => true,
            ]
        ],

        'location' => [
            [
                [
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ],
            ],
        ],
    ]);
}
