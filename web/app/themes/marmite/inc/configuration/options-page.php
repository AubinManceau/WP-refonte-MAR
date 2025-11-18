<?php

class MarmiteMenuPage {

    const GROUP = 'marmite_options';

    public static function register () {
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
    }

    public static function registerSettings () {

        // Enregistrement des options
        register_setting(self::GROUP, 'marmite_email');
        register_setting(self::GROUP, 'marmite_telephone');
        register_setting(self::GROUP, 'marmite_facebook');
        register_setting(self::GROUP, 'marmite_instagram');

        // Section
        add_settings_section(
            'marmite_section',
            '',
            function () {
                echo "Renseignez ici les informations de contact et les réseaux sociaux.";
            },
            self::GROUP
        );

        // Champ Email
        add_settings_field(
            'marmite_email_field',
            "Adresse email",
            function () {
                ?>
                <input type="email" name="marmite_email"
                    value="<?= esc_attr(get_option('marmite_email')) ?>"
                    style="width: 100%;">
                <?php
            },
            self::GROUP,
            'marmite_section'
        );

        // Champ Téléphone
        add_settings_field(
            'marmite_telephone_field',
            "Téléphone",
            function () {
                ?>
                <input type="text" name="marmite_telephone"
                    value="<?= esc_attr(get_option('marmite_telephone')) ?>"
                    style="width: 100%;">
                <?php
            },
            self::GROUP,
            'marmite_section'
        );

        // Champ Facebook
        add_settings_field(
            'marmite_facebook_field',
            "Facebook (URL)",
            function () {
                ?>
                <input type="url" name="marmite_facebook"
                    value="<?= esc_attr(get_option('marmite_facebook')) ?>"
                    style="width: 100%;">
                <?php
            },
            self::GROUP,
            'marmite_section'
        );

        // Champ Instagram
        add_settings_field(
            'marmite_instagram_field',
            "Instagram (URL)",
            function () {
                ?>
                <input type="url" name="marmite_instagram"
                    value="<?= esc_attr(get_option('marmite_instagram')) ?>"
                    style="width: 100%;">
                <?php
            },
            self::GROUP,
            'marmite_section'
        );
    }

    public static function addMenu () {
        add_menu_page(
            "Gestion de la Marmite",
            "Options du site",
            "manage_options",
            self::GROUP,
            [self::class, 'render'],
            'dashicons-admin-generic',
            80
        );
    }

    public static function render () {
        ?>
        <div class="wrap">
            <h1>Gestion de la Marmite</h1>

            <form action="options.php" method="post">
                <?php
                settings_fields(self::GROUP);
                do_settings_sections(self::GROUP);
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}

add_action('init', ['MarmiteMenuPage', 'register']);
