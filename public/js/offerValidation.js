const form = document.getElementById('form');
const title = document.getElementById('newoffer-title');
const price = document.getElementById('newoffer-price');
const desc = document.getElementById('newoffer-desc');
var canGoTitle = new Boolean(false);
var canGoDesc = new Boolean(false);


form.addEventListener('submit', (e) => {
    if (canGoTitle === false || canGoDesc === false) {
        e.preventDefault();
    }  
});

title.addEventListener('focusout', (e) => {
    const titleValue = title.value;
    canGoTitle = false;

    if(titleValue === '') {
        setErrorFor(title, 'Uzupełni tytuł');
    }
    else if (titleValue.length < 5){
        setErrorFor(title, 'Tytuł jest zbyt krótki');
    }
    else {
        setSuccessFor(title);
        canGoTitle = true;
    }
});
console.log(desc);
desc.addEventListener('focusout', (e) => {
    const descValue = desc.value;
    canGoTitle = false;

    if(descValue === '') {
        setErrorFor(desc, 'Uzupełni opis');
    }
    else if (descValue.length < 20){
        setErrorFor(desc, 'Opis jest zbyt krótki');
    }
    else {
        setSuccessFor(desc);
        canGoTitle = true;
    }
});


function setErrorFor(input, message) {
    const inputElement = input.parentElement;
    const small = inputElement.querySelector('small');

    small.innerText = message;

    inputElement.className = 'container-newoffer-element error';
}

function setSuccessFor(input) {
    const inputElement = input.parentElement;

    inputElement.className = 'container-newoffer-element success';
}