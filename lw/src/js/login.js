window.addEventListener('load', function() {
    let userData = {
        email: '',
        password: '',
    }

    const togglePasswordButton = document.getElementById('toggle-visibility');
    const eye = document.getElementById('eye');
    const loginButton = document.getElementById('login');

    const requiredFieldsNotification = document.getElementById('required-fields-empty');
    const requiredLoginFields = document.querySelectorAll('[required]');

    //inputs
    const emailInput = document.getElementById('input-email');
    const passwordInput = document.getElementById('input-password');

    function initListeners() {
        togglePasswordButton.addEventListener('click', toggleVisibility);
        emailInput.addEventListener('input', writeEmail);
        passwordInput.addEventListener('input', writePassword);
        loginButton.addEventListener('click', authorization);
    }

    function toggleVisibility(event) {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eye.src = 'static/images/eye-off.svg';
        } else {
            passwordInput.type = 'password';
            eye.src = 'static/images/eye.svg';
        }
    }

    function validateEmail(email) {
        let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function isValidPostData() {
        return validateEmail(userData.email) && userData.password.length >= 6;
    }

    async function authorization(event) {
        event.preventDefault();
        if (isValidPostData()) {
            requiredFieldsNotification.classList.remove('show');
            console.log(userData);
            const response = await fetch('/api/login', {
                method: "POST",
                body: JSON.stringify(userData),
                headers: {
                    'Content-Type': 'application/json',
                },
            });
            if (response.ok) {
                window.location.href = '/admin';
                console.log("Успех: ", JSON.stringify(userData));
            } else {
                console.log("Провал: ", response.status);
            }
        } else {
            requiredFieldsNotification.classList.add('show');
            if (!validateEmail(userData.email)) {
                console.log(userData.email)
                emailInput.style.borderBottom = '1px solid rgba(232, 105, 97, 1)';
            }
            if (userData.password.length < 6) {
                passwordInput.style.borderBottom = '1px solid rgba(232, 105, 97, 1)';
            }
        }
    }

    function writeEmail(event) {
        requiredFieldsNotification.classList.remove('show');
        if (event.target.value !== '') {
            userData.email = event.target.value;
        } else {
            userData.email = '';

        }
    }

    function writePassword(event) {
        requiredFieldsNotification.classList.remove('show');
        if (event.target.value !== '') {
            userData.password = event.target.value;
        } else {
            userData.password = '';

        }
    }

    initListeners();
});
