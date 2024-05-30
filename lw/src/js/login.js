let userData = {
    email: '',
    password: '',
}

const togglePasswordButton = document.getElementById('toggle-visibility');
const eye = document.getElementById('eye');
const loginButton = document.getElementById('login');

const requiredFieldsNotification = document.getElementById('required-fields-empty');

//inputs
const emailInput = document.getElementById('input-email');
const passwordInput = document.getElementById('input-password');

function initListeners() {
    togglePasswordButton.addEventListener('click', toggleVisibility);
    emailInput.addEventListener('input', writeEmail);
    passwordInput.addEventListener('input', writePassword);
    loginButton.addEventListener('click', authorisation);
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

function isValidPostData() {
    return userData.email !== ''
        && userData.password !== '';
}

async function authorisation(event) {
    event.preventDefault();
    if (isValidPostData() === true) {
        requiredFieldsNotification.hidden = true;
        console.log(userData);
        const response = await fetch('http://localhost:8001/api-login.php', {
            method: "POST",
            body: JSON.stringify(userData),
            headers: {
                'Content-Type': 'application/json',
            },
        });
        const json = await response.json();
        if (response.ok) {
            console.log("Успех: ", JSON.stringify(json));
        } else {
            console.log("Провал: ", response.status);
        }
    }
}

function writeEmail(event) {
    requiredFieldsNotification.hidden = true;
    if (event.target.value !== '') {
        userData.email = event.target.value;
    } else {
        userData.email = '';

    }
}

function writePassword(event) {
    requiredFieldsNotification.hidden = true;
    if (event.target.value !== '') {
        userData.password = event.target.value;
    } else {
        userData.password = '';

    }
}

initListeners();

