<form class="form-wrapper <?php echo esc_attr( $args['class'] ?? '' ); ?>" aria-labelledby="contact-title">
    <h2 id="contact-title" class="title-2 blanc mb-8 text-center">Contact</h2>

    <label class="sr-only" for="contact-name">Nom / Prénom</label>
    <input id="contact-name" type="text" placeholder="Nom / Prénom">

    <label class="sr-only" for="contact-email">Adresse mail</label>
    <input id="contact-email" type="email" placeholder="Adresse mail">

    <label class="sr-only" for="contact-subject">Objet</label>
    <input id="contact-subject" type="text" placeholder="Objet">

    <label class="sr-only" for="contact-message">Votre message</label>
    <textarea id="contact-message" placeholder="Votre message"></textarea>

    <button class="btn-primary">Envoyer</button>
</form>