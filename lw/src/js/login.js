window.addEventListener('load', function() {
    let userData = {
        email: '',
        password: '',
    }

    const togglePasswordButton = document.getElementById('toggle-visibility');
    const eye = document.getElementById('eye');
    const loginButton = document.getElementById('login');

    const requiredFieldsNotification = document.getElementById('required-fields-empty');
    const dataIsIncorrectNotification = document.getElementById('data-is-incorrect');
    const emailIsRequiredNotification = document.getElementById('email-is-required');
    const emailIsIncorrectNotification = document.getElementById('email-is-incorrect');
    const passwordIsRequiredNotification = document.getElementById('password-is-required');

    //inputs
    const emailInput = document.getElementById('input-email');
    const passwordInput = document.getElementById('input-password');
    const inputs = document.querySelectorAll('input');

    function inputFocus(event) {
        event.target.className = 'input-focus'

        event.target.addEventListener('blur', inputBlur);
    }

    function inputBlur(event) {
        if (event.target.value === '') {
            event.target.className = ''
        } else {
            event.target.className = 'input-focus'
        }
    }

    for (const input of inputs) {
        input.addEventListener('focus', inputFocus);
    }

    function initListeners() {
        togglePasswordButton.addEventListener('click', toggleVisibility);
        emailInput.addEventListener('input', writeEmail);
        passwordInput.addEventListener('input', writePassword);
        loginButton.addEventListener('click', authorization);
    }

    function clearNotifications() {
        requiredFieldsNotification.classList.remove('show');
        dataIsIncorrectNotification.classList.remove('show');
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
        clearNotifications();
        if (isValidPostData()) {
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
                dataIsIncorrectNotification.classList.add('show');
                console.log("Провал: ", response.status);
            }
        } else {
            requiredFieldsNotification.classList.add('show');
            if (!validateEmail(userData.email)) {
                if (userData.email !== '') {
                    emailIsIncorrectNotification.classList.add('show')
                    emailInput.className = 'input-error-incorrect';
                } else {
                    emailIsRequiredNotification.classList.add('show');
                    emailInput.className = 'input-error-empty';
                }
            }
            if (userData.password.length < 6) {
                if (userData.password !== '') {
                    passwordInput.className = 'input-error-incorrect';
                } else {
                    passwordIsRequiredNotification.classList.add('show');
                    passwordInput.className = 'input-error-empty';
                }
            }
        }
    }

    function writeEmail(event) {
        clearNotifications();
        emailIsIncorrectNotification.classList.remove('show');
        emailIsRequiredNotification.classList.remove('show');
        emailInput.className = 'input-focus';
        if (event.target.value !== '') {
            userData.email = event.target.value;
        } else {
            userData.email = '';

        }
    }

    function writePassword(event) {
        clearNotifications();
        passwordIsRequiredNotification.classList.remove('show');
        passwordInput.className = 'input-focus';
        if (event.target.value !== '') {
            userData.password = event.target.value;
        } else {
            userData.password = '';

        }
    }

    initListeners();
});
