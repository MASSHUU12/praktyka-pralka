const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const passwordRepeat = document.getElementById('password-repeat');
var canGoUser = new Boolean(false);
var canGoEmail = new Boolean(false);
var canGoPassword = new Boolean(false);
var canGoPasswordCheck = new Boolean(false);

// canGoUser = false;
// canGoEmail = false;
// canGoPassword = false;
// canGoPasswordCheck = false;

form.addEventListener('submit', (e) => {
    if (canGoUser === false || canGoEmail === false || canGoPassword === false || canGoPasswordCheck === false) {
        e.preventDefault();
    }  
});

username.addEventListener('focusout', (e) => {
    const usernameValue = username.value.trim();
    canGoUser = false;

    if(usernameValue === '') {
        setErrorFor(username, 'Uzupełni nazwe konta');
    }
    else if (usernameValue.length < 4){
        setErrorFor(username, 'Nazwa konta jest zbyt krótka');
    }
    else {
        setSuccessFor(username);
        canGoUser = true;
    }
});

email.addEventListener('focusout', (e) => {
    const emailValue = email.value.trim();
    canGoDesc = false;

    if(emailValue === '') {
        setErrorFor(email, 'Uzupełni e-mail');
    }
    else if (!emailCheck(emailValue)) {
        setErrorFor(email, 'Niepoprawny format e-mail');
    }
    else {
        setSuccessFor(email);
        canGoDesc = true;
    }
});

password.addEventListener('keyup', (e) => { 
    const passwordValue = password.value.trim();
    const weak = document.getElementById('weak');
    const medium = document.getElementById('medium');
    const strong = document.getElementById('strong');

    canGoPassword = false;

    valueMedium = /((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,}))/;
    valueStrong = /((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/])(?=.{12,}))/;
    if(passwordValue.length < 8) {
        setErrorFor(password, '');
        weak.classList.add('weak');
    }
    else {
        setSuccessFor(password);
        canGoPassword = true;
    }

    if(passwordValue.length == 0) 
        weak.classList.remove('weak');

    if (valueMedium.test(passwordValue)) {       
        medium.classList.add('medium');
    }
    else 
        medium.classList.remove('medium');

    if (valueStrong.test(passwordValue)) {
        strong.classList.add('strong');
    }
    else 
        strong.classList.remove('strong');
});

passwordRepeat.addEventListener('focusout', (e) => {
    const passwordRepeatValue = passwordRepeat.value.trim();
    const passwordValue = password.value.trim();
    canGoPassword = false;

    if(passwordRepeatValue !== passwordValue || passwordRepeatValue.length == 0) {
        setErrorFor(passwordRepeat, 'hasła nie zgadzają się');
    }
    else {
        setSuccessFor(passwordRepeat);
        canGoPassword = true;
    }
});

function setErrorFor(input, message) {
    const inputElement = input.parentElement;
    const small = inputElement.querySelector('small');

    small.innerText = message;

    inputElement.className = 'container-login-element error';
}

function setSuccessFor(input) {
    const inputElement = input.parentElement;

    inputElement.className = 'container-login-element success';
}

function emailCheck(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}