<?php
/**
 * Plugin Name: Custom Gallery Field
 * Description: Ajoute une galerie d'images au template de page "template-gallery.php".
 * Version: 1.0
 * Author: ChatGPT
 */

if (!defined('ABSPATH')) exit;

// Charger scripts et styles admin
add_action('admin_enqueue_scripts', function($hook) {
    global $post;

    if (($hook == 'post.php' || $hook == 'post-new.php') && $post && get_page_template_slug($post->ID) === 'template-gallery.php') {
        wp_enqueue_media();
        wp_enqueue_script('cgf-script', plugin_dir_url(__FILE__) . 'js/gallery.js', ['jquery', 'jquery-ui-sortable'], '1.0', true);
        wp_enqueue_style('cgf-style', plugin_dir_url(__FILE__) . 'css/gallery.css');
    }
});

// Ajouter une meta box pour la galerie - UNIQUEMENT si template-gallery.php
add_action('add_meta_boxes', function() {
    global $post;
    
    // Vérifier si c'est une page avec le bon template
    if ($post && get_page_template_slug($post->ID) === 'template-gallery.php') {
        add_meta_box(
            'cgf_gallery',
            'Galerie d\'images',
            'cgf_gallery_metabox_html',
            'page',
            'normal',
            'high'
        );
    }
});

function cgf_gallery_metabox_html($post) {
    $images = get_post_meta($post->ID, '_cgf_gallery', true);
    $images = is_array($images) ? $images : [];
    ?>

    <input type="hidden" id="cgf-gallery-input" name="cgf_gallery" value="<?php echo implode(',', $images); ?>">

    <div id="cgf-gallery-wrapper">
        <?php foreach ($images as $id): 
            $src = wp_get_attachment_image_url($id, 'medium'); ?>
            <div class="cgf-thumb" data-id="<?php echo $id; ?>">
                <img src="<?php echo $src; ?>">
            </div>
        <?php endforeach; ?>
    </div>

    <button type="button" id="cgf-add-images" class="button button-primary">Sélectionner des images</button>

    <?php
}

// Sauvegarde
add_action('save_post', function($post_id) {
    if (isset($_POST['cgf_gallery'])) {
        $ids = array_filter(array_map('intval', explode(',', $_POST['cgf_gallery'])));
        update_post_meta($post_id, '_cgf_gallery', $ids);
    }
});