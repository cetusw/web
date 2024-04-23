const inputs = document.querySelectorAll('#input');

function inputFocus(event) {
    event.target.style.backgroundColor = 'rgba(247, 247, 247, 1)';
    event.target.style.borderBottom = '1px solid rgba(46, 46, 46, 1)';

    event.target.addEventListener('blur', inputBlur);
}

function inputBlur(event) {
    if (event.target.value === '') {
        event.target.style.backgroundColor = 'rgba(255, 255, 255, 1)';
        event.target.style.borderBottom = '1px solid rgba(247, 247, 247, 1)';
    }
}

for (const input of inputs) {
    input.addEventListener('focus', inputFocus);
    input.addEventListener('input', inputFocus);

}

