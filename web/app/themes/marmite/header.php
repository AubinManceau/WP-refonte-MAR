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

            <!-- Bandeau contenant le menu mobile + formulaire -->
            <div class="bandeau">

                <!-- Zone mobile : menu + logo (cachée sur desktop) -->
                <div class="mobile-menu lg:hidden">
                    <div class="logo-container">
                        <a href="<?php echo home_url('/'); ?>">
                            <?php echo file_get_contents(get_template_directory() . '/assets/img/logo-header.svg'); ?>
                        </a>
                    </div>

                    <div class="container-mobile">
                        <nav class="menu-nav" aria-label="Menu principal">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-principal',
                                'container'      => '',
                                'fallback_cb'    => false,
                                'items_wrap'     => '%3$s'
                            ));
                            ?>
                        </nav>
    
                        <?php get_template_part('template-parts/contact-form', null, ['class' => 'mobile']); ?>
                    </div>
                </div>

                <?php get_template_part('template-parts/contact-form'); ?>
            </div>
            <button id="contact-btn" class="contact" aria-label="Ouvrir le formulaire de contact">
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