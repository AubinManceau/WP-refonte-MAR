<?php
/**
 * Template Name: Les archives du Royaume
 */

get_header(); ?>

<main class="gallery-page">
    <?php while (have_posts()) : the_post(); ?>
        <?php
        $gallery_ids = get_post_meta(get_the_ID(), '_cgf_gallery', true);
        
        if (!empty($gallery_ids) && is_array($gallery_ids)) : ?>
            
            <div class="custom-gallery">
                <?php foreach ($gallery_ids as $image_id) : 
                    // Récupérer l'URL de l'image en taille 'large'
                    $image_url = wp_get_attachment_image_url($image_id, 'large');
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    ?>
                    
                    <div class="gallery-item">
                        <img src="<?php echo esc_url($image_url); ?>" 
                             alt="<?php echo esc_attr($image_alt); ?>">
                    </div>
                    
                <?php endforeach; ?>
            </div>
            
        <?php else : ?>
            <p>Aucune image dans la galerie.</p>
        <?php endif; ?>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>