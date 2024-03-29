var currentUrl = window.location.href;
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const conditions = document.querySelectorAll('.search-left-element > p');
if (urlParams.has('cond')) {
    conditions.forEach(condition => {     
        var conditionValue = condition.innerHTML.toLowerCase();
        if (conditionValue.includes('bardzo')) 
            conditionValue = 'bardzo';
    
        if (urlParams.get('cond').includes(conditionValue)) {
            condition.classList.add('active-condition');
        }
        else 
            condition.classList.remove('active-condition');
    });
}

function paginationUrl(page) {
    urlParams.set('page', page);

    var urlNew = window.location.href.split('?')[0];
    window.location.href = urlNew + '?' +  urlParams.toString();
}

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

function condUrl(value) {
    if (urlParams.has('cond')) {
        if (urlParams.get('cond') === value) {
            urlParams.delete('cond');
        }
        else {
            if (urlParams.get('cond').includes(value)) {
                var replaceParams = urlParams.get('cond').replace(value + ',', '');
                if (!urlParams.get('cond').includes(value + ','))
                     replaceParams = urlParams.get('cond').replace(',' + value, '');
                
                urlParams.set('cond', replaceParams);
            }
            else {
                const condParams = urlParams.get('cond') + ',' + value;
                urlParams.set('cond', condParams);
            }
        }
    }
    else 
        urlParams.set('cond', value);
    
    var urlNew = window.location.href.split('?')[0];
    window.location.href = urlNew + '?' +  urlParams.toString();
}

function clearUrl() {
    const searchParam = urlParams.get('search');
    var urlNew = window.location.href.split('?')[0];
    if (searchParam === null)
        searchParam = '';

    window.location.href = urlNew + '?search=' +  searchParam;
}

window.onload = function() {
    var selectValue = urlParams.get('sort');
    if (urlParams.has('sort') == false) 
        selectValue = '';
    
    selectElement('selectbox', selectValue);
};

function selectElement(id, valueToSelect) {    
    let element = document.getElementById(id);
    element.value = valueToSelect;
}
