<?php
get_header(); ?>

<main class="marmiton-page">
    <div class="container">
        <h2 class="title-2">La Cours des Marmitons</h2>
        <img class="banner" src="<?php echo get_template_directory_uri(); ?>/assets/img/photo-de-classe.png" alt="Photo de classe des marmitons">
        <div class="wrapper">
            <?php while (have_posts()) : the_post(); ?>
                <?php 
                $name = get_the_title();
                $image = get_field('marmiton_image');
                $instrument = get_field('marmiton_instrument');
                $bio = get_field('marmiton_bio');
                ?>
                <div class="marmiton-card">
                    <div class="image-container">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </div>
                    <div class="marmiton-info">
                        <h3 class="title-name"><?php echo esc_html($name); ?><span> - <?php echo esc_html($instrument); ?></span></h3>
                        <div class="marmiton-bio">
                            <?php echo wp_kses_post($bio); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>