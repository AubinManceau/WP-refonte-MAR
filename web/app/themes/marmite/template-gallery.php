<?php
/**
 * Template Name: Les archives du Royaume
 */

get_header(); ?>

<main class="gallery-page">
    <div class="container">
        <h2 class="title-2">Galerie</h2>
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $gallery_ids = get_post_meta(get_the_ID(), '_cgf_gallery', true);
            if (!empty($gallery_ids) && is_array($gallery_ids)) : ?>
                <div class="custom-gallery">
                    <?php foreach ($gallery_ids as $image_id) : 
                        $image_url = wp_get_attachment_image_url($image_id);
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        ?>  
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>Aucune image dans la galerie.</p>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>