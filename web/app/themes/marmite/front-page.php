<?php 
$hero = get_field('field_home_hero_image');
$title = get_field('field_home_title');
$description = get_field('field_home_description');
$video = get_field('field_home_video');

$dates_query = new WP_Query([
    'post_type' => 'date',
    'posts_per_page' => -1,
    'meta_key' => 'date_event',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => [
        [
            'key' => 'date_event',
            'value' => date('Ymd'),
            'compare' => '>=',
            'type' => 'NUMERIC',
        ]
    ]
]);

get_header(); ?>

<main class="homepage">
    <section class="container hero">
        <img src="<?php echo esc_url($hero['url']); ?>" alt="<?php echo esc_attr($hero['alt']); ?>" />
    </section>
    <section class="hero-content">
        <div class="container">
            <h1 class="title-1"><?php echo esc_html($title); ?></h1>
            <p class="description"><?php echo esc_html($description); ?></p>
        </div>
    </section>
    <section class="container video">
        <div class="wrapper">
            <h2 class="title-2 text-center">La Marmite sur scène</h2>
            <div class="video-wrapper">
                <?php echo wp_oembed_get($video); ?>
            </div>
        </div>
    </section>
    <section class="container dates">
        <div class="wrapper">
            <h2 class="title-2 text-center">Nos Dates</h2>
            <?php if ($dates_query->have_posts()) : ?>
                <div class="dates-container">
                    <?php while ($dates_query->have_posts()) : $dates_query->the_post(); 
                        $date = get_field('field_date_event');
                        $description = get_field('field_date_description');
                        $image = get_field('field_date_banner_image');
                        $title = get_the_title();
                        $link = get_field('field_date_link');
                    ?>
                    <?php get_template_part('template-parts/date-card', null, [
                        'date' => $date,
                        'description' => $description,
                        'image' => $image,
                        'title' => $title,
                        'link' => $link,
                    ]); ?>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer();
