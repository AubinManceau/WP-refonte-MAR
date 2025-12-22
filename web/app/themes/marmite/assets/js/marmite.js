document.addEventListener('DOMContentLoaded', function() {
    const contactBtn = document.getElementById('contact-btn');
    const bandeau = document.getElementById('bandeau');

    contactBtn.addEventListener('click', function() {
        bandeau.classList.toggle('active');
    });

    lightGallery(document.querySelector('.custom-gallery'), {
        selector: 'img'
    });
    
    // GÉRER TOUS LES FORMULAIRES (desktop + mobile)
    const forms = document.querySelectorAll('#contact-form');
    
    if (forms.length === 0) return;
    
    console.log(`${forms.length} formulaire(s) trouvé(s)`);
    
    // Fonctions utilitaires
    function clearErrors(form) {
        form.querySelectorAll('.error-message').forEach(error => {
            error.classList.add('hidden');
            error.textContent = '';
        });
        form.querySelectorAll('input, textarea').forEach(field => {
            field.classList.remove('border-red-500', 'border-2');
        });
    }
    
    function showError(form, field, message) {
        const input = form.querySelector(`[name="${field}"]`);
        const errorSpan = form.querySelector(`[data-error="${field.replace('contact_', '')}"]`);
        
        if (input) input.classList.add('border-red-500', 'border-2');
        if (errorSpan) {
            errorSpan.textContent = message;
            errorSpan.classList.remove('hidden');
        }
    }
    
    function showMessage(form, message, type) {
        const formMessage = form.querySelector('#form-message');
        if (!formMessage) return;
        
        formMessage.textContent = message;
        formMessage.classList.remove('hidden', 'bg-green-100', 'text-green-700', 'bg-red-100', 'text-red-700');
        
        if (type === 'success') {
            formMessage.classList.add('bg-green-100', 'text-green-700');
        } else {
            formMessage.classList.add('bg-red-100', 'text-red-700');
        }
    
        setTimeout(() => {
            formMessage.classList.add('hidden');
        }, 5000);
    }
    
    function validateForm(form) {
        clearErrors(form);
        let isValid = true;
    
        const name = form.querySelector('#contact-name')?.value.trim() || '';
        const email = form.querySelector('#contact-email')?.value.trim() || '';
        const subject = form.querySelector('#contact-subject')?.value.trim() || '';
        const message = form.querySelector('#contact-message')?.value.trim() || '';
    
        if (name.length < 2) {
            showError(form, 'contact_name', 'Le nom doit contenir au moins 2 caractères');
            isValid = false;
        }
    
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showError(form, 'contact_email', 'Adresse email invalide');
            isValid = false;
        }
    
        if (subject.length < 3) {
            showError(form, 'contact_subject', 'L\'objet doit contenir au moins 3 caractères');
            isValid = false;
        }
    
        if (message.length < 10) {
            showError(form, 'contact_message', 'Le message doit contenir au moins 10 caractères');
            isValid = false;
        }
    
        return isValid;
    }
    
    // Attacher l'événement à CHAQUE formulaire
    forms.forEach(function(form, index) {
        console.log(`Initialisation du formulaire ${index + 1}`);
        
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
        
            console.log(`Formulaire ${index + 1} soumis`);
            
            if (!validateForm(form)) {
                console.log('Validation échouée');
                return false;
            }
        
            const buttonText = form.querySelector('.button-text');
            const buttonLoader = form.querySelector('.button-loader');
            const submitButton = form.querySelector('button[type="submit"]');
            
            if (buttonText) buttonText.classList.add('hidden');
            if (buttonLoader) buttonLoader.classList.remove('hidden');
            if (submitButton) submitButton.disabled = true;
        
            const formData = new FormData(form);
            formData.append('action', 'send_contact_form');
        
            try {
                const response = await fetch(ajaxurl, {
                    method: 'POST',
                    body: formData
                });
        
                const data = await response.json();
                console.log('Réponse:', data);
        
                if (data.success) {
                    showMessage(form, data.data.message, 'success');
                    form.reset();
                } else {
                    if (data.data && data.data.errors) {
                        Object.entries(data.data.errors).forEach(([field, message]) => {
                            showError(form, field, message);
                        });
                    }
                    showMessage(form, data.data?.message || 'Une erreur est survenue', 'error');
                }
            } catch (error) {
                console.error('Erreur:', error);
                showMessage(form, 'Erreur de connexion. Veuillez réessayer.', 'error');
            } finally {
                if (buttonText) buttonText.classList.remove('hidden');
                if (buttonLoader) buttonLoader.classList.add('hidden');
                if (submitButton) submitButton.disabled = false;
            }
            
            return false;
        });
    });
});