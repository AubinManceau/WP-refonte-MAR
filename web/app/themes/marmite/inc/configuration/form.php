<?php
add_action('admin_post_nopriv_send_custom_contact_form', 'handle_custom_contact_form');
add_action('admin_post_send_custom_contact_form', 'handle_custom_contact_form');

function handle_custom_contact_form() {
    if (!empty($_POST['website'])) {
        wp_redirect(home_url());
        exit;
    }

    $name = sanitize_text_field($_POST['contact_name'] ?? '');
    $email = sanitize_email($_POST['contact_email'] ?? '');
    $subject = sanitize_text_field($_POST['contact_subject'] ?? '');
    $message = sanitize_textarea_field($_POST['contact_message'] ?? '');

    if (!$name || !$email || !$subject || !$message) {
        wp_redirect(home_url('/contact?error=missing'));
        exit;
    }

    // Préparer l'email
    $to = get_option('marmite_email');
    $headers = [
        "From: $name <$email>",
        "Reply-To: $email",
        'Content-Type: text/plain; charset=UTF-8',
    ];

    $body = "Nom : $name\nEmail : $email\nObjet : $subject\nMessage :\n$message";

    wp_mail($to, $subject, $body, $headers);

    wp_redirect(home_url());
    exit;
}
