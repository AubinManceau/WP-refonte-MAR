<?php
function marmite_register_footer_menu_coordonnees() {
    register_nav_menus(
        array(
            'footer-menu-coordonnees' => esc_html__('Footer - Liens Coordonnées', 'marmite'),
        )
    );
}
add_action('after_setup_theme', 'marmite_register_footer_menu_coordonnees');
function marmite_create_footer_menu_coordonnees() {
    $menu_name = 'Menu Footer Coordonnées';
    $location = 'footer-menu-coordonnees';

    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Mentions Légales',
            'menu-item-url' => home_url('/mentions-legales/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'CFPT',
            'menu-item-url' => home_url('/cfpt/'),
            'menu-item-status' => 'publish',
            'menu-item-type' => 'custom',
        ));

        $locations = get_theme_mod('nav_menu_locations');
        $locations[$location] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

add_action('after_setup_theme', 'marmite_create_footer_menu_coordonnees');
