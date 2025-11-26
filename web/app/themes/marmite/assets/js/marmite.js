document.addEventListener('DOMContentLoaded', function() {
    const contactBtn = document.getElementById('contact-btn');
    const bandeau = document.getElementById('bandeau');

    contactBtn.addEventListener('click', function() {
        bandeau.classList.toggle('active');
    });
});