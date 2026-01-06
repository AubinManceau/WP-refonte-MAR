<article class="date-card">
    <img src="<?php echo esc_url($args['image']['url']); ?>" alt="<?php echo esc_attr($args['image']['alt']); ?>" />
    <h3 class="title-3"><?php echo esc_html($args['title']); ?></h3>
    <p class="date"><?php echo esc_html($args['date']); ?></p>
    <p class="description"><?php echo esc_html($args['description']); ?></p>
    <div class="flex justify-end w-full mt-auto">
        <?php if (!empty($args['link'])) : ?>
            <a class="btn btn-secondary" href="<?php echo esc_url($args['link']); ?>" target="_blank" rel="noopener noreferrer">Voir la billeterie</a>
        <?php endif; ?>
    </div>
</article>