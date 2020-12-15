const form = document.getElementById('form');
const username = document.getElementById('username');
const number = document.getElementById('number');
const city = document.getElementById('city');
const zip = document.getElementById('zip');
var canGoUser = new Boolean(false);
var canGoNumber = new Boolean(false);
var canGoCity = new Boolean(false);
var canGoZip = new Boolean(false);

form.addEventListener('submit', (e) => {
    if (canGoUser === false || canGoNumber === false || canGoCity === false || canGoZip === false) {
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

number.addEventListener('focusout', (e) => {
    const numberValue = number.value;
    canGoNumber = false;

    if(numberValue.length !== 9) {
        setErrorFor(number, 'Niepoprawny format numeru');
    }
    else {
        setSuccessFor(number);
        canGoNumber = true;
    }
});

city.addEventListener('focusout', (e) => {
    const cityValue = city.value;
    canGoCity = false;

    if(cityValue.length < 1) {
        setErrorFor(city, 'Uzupełni miasto');
    }
    else {
        setSuccessFor(city);
        canGoCity = true;
    }
});

zip.addEventListener('focusout', (e) => { 
    const zipValue = zip.value;
    canGoZip = false;

    zipCheck = /[0-9]{2}-[0-9]{3}/;

    if(!zipCheck.test(zipValue)) {
        setErrorFor(zip, 'Niepoprawny format');
    }
    else {
        setSuccessFor(zip);
        canGoZip = true;
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
