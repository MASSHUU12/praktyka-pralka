var currentUrl = window.location.href;
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

function createUrl() {
    const selectValue = document.getElementById("selectbox").value;
    urlParams.set('sort', selectValue);
    if (urlParams.get('sort') === '') 
        urlParams.delete('sort');

    var urlNew = window.location.href.split('?')[0];
    window.location.href = urlNew + '?' +  urlParams.toString();
}

function priceUrl() {
    const from = document.getElementById("from").value;
    const to = document.getElementById("to").value;
    urlParams.set('from', from);
    urlParams.set('to', to);

    var urlNew = window.location.href.split('?')[0];
    window.location.href = urlNew + '?' +  urlParams.toString();
}

window.onload = function() {
    const selectValue = urlParams.get('sort');
    if (urlParams.has('sort') == false) 
        selectValue = '';
    
    selectElement('selectbox', selectValue);
};

function selectElement(id, valueToSelect) {    
    let element = document.getElementById(id);
    element.value = valueToSelect;
}
