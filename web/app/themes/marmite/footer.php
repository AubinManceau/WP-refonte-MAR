<?php
$email      = get_option('marmite_email');
$telephone  = get_option('marmite_telephone');
$facebook   = get_option('marmite_facebook');
$instagram  = get_option('marmite_instagram');
?>
    
    <footer>
        <div class="container">
            <div class="wrapper">
                <a href="<?php echo home_url('/'); ?>"><?php echo file_get_contents( get_template_directory() . '/assets/img/logo.svg' ); ?></a>
                <div class="menu-container">
                    <div class="contact">
                        <p class="footer-title">Coordonnées</p>
                        <div class="footer-link">
                            <a href="tel:<?php echo esc_attr($telephone); ?>"><?php echo esc_html($telephone); ?></a>
                            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            <?php
                            wp_nav_menu( array(
                                    'theme_location' => 'footer-menu-coordonnees',
                                    'container'      => '',
                                    'fallback_cb'    => false,
                                    'items_wrap'     => '%3$s'
                            ) );
                            ?>
                        </div>
                    </div>
                    <div class="navigation">
                        <p class="footer-title">Navigation</p>
                        <div class="footer-link">
                            <?php
                            wp_nav_menu( array(
                                    'theme_location' => 'footer-menu-navigation',
                                    'container'      => '',
                                    'fallback_cb'    => false,
                                    'items_wrap'     => '%3$s'
                            ) );
                            ?>
                        </div>
                    </div>
                </div>
                <div class="socials-container">
                    <a href="<?php echo esc_url($facebook); ?>"><?php echo file_get_contents( get_template_directory() . '/assets/img/facebook.svg' ); ?></a>
                    <a href="<?php echo esc_url($instagram); ?>"><?php echo file_get_contents( get_template_directory() . '/assets/img/instagram.svg' ); ?></a>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>