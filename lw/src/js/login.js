const passwordInput = document.getElementById('input-password');
const togglePassword = document.getElementById('togglePassword');

togglePassword.addEventListener('click', function() {
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        togglePassword.classList.add('show-password');
    } else {
        passwordInput.type = 'password';
        togglePassword.classList.remove('show-password');
    }
});