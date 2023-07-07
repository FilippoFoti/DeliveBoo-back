document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password-confirm');

    function validatePasswords(event) {
        if (passwordInput.value !== confirmPasswordInput.value) {
            event.preventDefault(); // Blocca l'invio del form
            confirmPasswordInput.setCustomValidity('Le password non coincidono');
        } else {
            confirmPasswordInput.setCustomValidity(''); // Ripristina il messaggio di errore personalizzato
        }
    }
    registerForm.addEventListener('submit', validatePasswords);
    confirmPasswordInput.addEventListener('input', validatePasswords);
});