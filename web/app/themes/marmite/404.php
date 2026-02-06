<?php 
get_header(); ?>

<main class="page-404">
    <section class="container">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/fond-site-femme.png'; ?>" alt="" />
        <div class="">
            <h2 class="title-2">Oups, cette page n'existe pas.</h2>
            <p class="description">
                Il semblerait que la page que vous cherchez ait été déplacée ou supprimée. 
                Vous pouvez retourner à la <a href="<?php echo home_url(); ?>">page d'accueil</a> pour continuer votre navigation.
            </p>
        </div>
    </section>
</main>
<?php get_footer();
