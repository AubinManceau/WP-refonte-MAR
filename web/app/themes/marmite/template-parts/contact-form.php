<form id="contact-form" class="form-wrapper <?php echo esc_attr( $args['class'] ?? '' ); ?>" aria-labelledby="contact-title">
    <h2 id="contact-title" class="title-2 blanc mb-8 text-center">Contact</h2>

    <!-- Message de succès/erreur -->
    <div id="form-message" class="hidden mb-4 p-3 rounded-sm text-sm" role="alert"></div>

    <label class="sr-only" for="contact-name">Nom / Prénom</label>
    <input id="contact-name" name="contact_name" type="text" placeholder="Nom / Prénom" required>
    <span class="error-message hidden text-red-500 text-xs mt-1" data-error="name"></span>

    <label class="sr-only" for="contact-email">Adresse mail</label>
    <input id="contact-email" name="contact_email" type="email" placeholder="Adresse mail" required>
    <span class="error-message hidden text-red-500 text-xs mt-1" data-error="email"></span>

    <label class="sr-only" for="contact-subject">Objet</label>
    <input id="contact-subject" name="contact_subject" type="text" placeholder="Objet" required>
    <span class="error-message hidden text-red-500 text-xs mt-1" data-error="subject"></span>

    <label class="sr-only" for="contact-message">Votre message</label>
    <textarea id="contact-message" name="contact_message" placeholder="Votre message" required></textarea>
    <span class="error-message hidden text-red-500 text-xs mt-1" data-error="message"></span>

    <!-- Honeypot anti-spam (caché aux utilisateurs réels) -->
    <input type="text" name="website" id="website" value="" style="position:absolute;left:-9999px;width:1px;height:1px;" tabindex="-1" autocomplete="off" aria-hidden="true">

    <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>

    <button type="submit" class="btn-primary">
        <span class="button-text">Envoyer</span>
        <span class="button-loader hidden">Envoi...</span>
    </button>
</form>