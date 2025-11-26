<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
<body>
    <header>
        <div id="bandeau" class="contact-container">
            <div class="bandeau">
                <form class="form-wrapper">
                    <h2 class="title-2 blanc mb-8 text-center">Contact</h2>
                    <input type="text" placeholder="Nom / Prénom">
                    <input type="email" placeholder="Adresse mail">
                    <input type="text" placeholder="Objet">
                    <textarea placeholder="Votre message"></textarea>
                    <button class="btn-primary">Envoyer</button>
                </form>
            </div>
            <button id="contact-btn" class="contact">
                <?php echo file_get_contents(get_template_directory() . '/assets/img/contact-bandeau.svg'); ?>
            </button>
        </div>
        <div class="container">
            <div class="wrapper">
                <div class="show-2-first-only menu-nav">
                    <?php
                    wp_nav_menu( array(
                            'theme_location' => 'menu-principal',
                            'container'      => '',
                            'fallback_cb'    => false,
                            'items_wrap'     => '%3$s'
                    ) );
                    ?>
                </div>
                 <div class="logo-container">
                    <a href="<?php echo home_url('/'); ?>">
                        <?php echo file_get_contents(get_template_directory() . '/assets/img/logo-header.svg'); ?>
                    </a>
                </div>
                <div class="show-2-last-only menu-nav">
                    <?php
                    wp_nav_menu( array(
                            'theme_location' => 'menu-principal',
                            'container'      => '',
                            'fallback_cb'    => false,
                            'items_wrap'     => '%3$s'
                    ) );
                    ?>
                </div>
            </div>
            <div class="rounded-header"></div>
        </div>
    </header>