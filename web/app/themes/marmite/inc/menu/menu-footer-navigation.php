<?php
function marmite_register_footer_menu_navigation() {
    register_nav_menus(
        array(
            'footer-menu-navigation' => esc_html__('Footer - Liens Navigation', 'marmite'),
        )
    );
}
add_action('after_setup_theme', 'marmite_register_footer_menu_navigation');
function marmite_create_footer_menu_navigation() {
    $menu_name = 'Menu Footer Navigation';
    $location = 'footer-menu-navigation';

    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Accueil',
            'menu-item-url' => home_url('/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'La cour des marmitons',
            'menu-item-url' => home_url('/la-cour-des-marmitons/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Les archives du royaume',
            'menu-item-url' => home_url('/les-archives-du-royaume/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'L\'histoire du maugistan',
            'menu-item-url' => home_url('/l-histoire-du-maugistan/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));

        $locations = get_theme_mod('nav_menu_locations');
        $locations[$location] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

add_action('after_setup_theme', 'marmite_create_footer_menu_navigation');
