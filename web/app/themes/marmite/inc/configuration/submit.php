<?php
add_action('wp_ajax_send_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'handle_contact_form');

function handle_contact_form() {
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_send_json_error([
            'message' => 'Erreur de sécurité. Veuillez recharger la page.'
        ]);
    }

    if (!empty($_POST['website'])) {
        wp_send_json_success([
            'message' => 'Votre message a été envoyé avec succès !'
        ]);
        exit;
    }

    $name = sanitize_text_field($_POST['contact_name'] ?? '');
    $email = sanitize_email($_POST['contact_email'] ?? '');
    $subject = sanitize_text_field($_POST['contact_subject'] ?? '');
    $message = sanitize_textarea_field($_POST['contact_message'] ?? '');

    $errors = [];

    if (strlen($name) < 2) {
        $errors['contact_name'] = 'Le nom doit contenir au moins 2 caractères';
    }

    if (!is_email($email)) {
        $errors['contact_email'] = 'Adresse email invalide';
    }

    if (strlen($subject) < 3) {
        $errors['contact_subject'] = 'L\'objet doit contenir au moins 3 caractères';
    }

    if (strlen($message) < 10) {
        $errors['contact_message'] = 'Le message doit contenir au moins 10 caractères';
    }

    if (!empty($errors)) {
        wp_send_json_error([
            'message' => 'Veuillez corriger les erreurs',
            'errors' => $errors
        ]);
    }

    $to_email      = get_option('marmite_email');
    $to = get_option($to_email);
    
    $email_subject = 'Nouveau message de contact : ' . $subject;
    
    $email_message = "Nouveau message depuis le formulaire de contact\n\n";
    $email_message .= "Nom : $name\n";
    $email_message .= "Email : $email\n";
    $email_message .= "Objet : $subject\n\n";
    $email_message .= "Message :\n$message\n";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    ];

    $sent = wp_mail($to, $email_subject, $email_message, $headers);

    if ($sent) {
        wp_send_json_success([
            'message' => 'Votre message a été envoyé avec succès !'
        ]);
    } else {
        wp_send_json_error([
            'message' => 'Erreur lors de l\'envoi du message. Veuillez réessayer.'
        ]);
    }
}