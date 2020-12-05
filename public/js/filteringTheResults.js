var currentUrl = window.location.href;
var clear;

function reset() {
    clearCond();
    history.pushState('Sklep internetowy Pralka', 'Sklep internetowy Pralka', clear);
}

function clearCond() {
    clear = currentUrl.replace("&cond=", "");
    clear = clear.replace("jak%20nowy", "");
    clear = clear.replace("bardzo%20dobry", "");
    clear = clear.replace("dobry", "");
    clear = clear.replace("przeci%C4%99tny", "");
}

function byCondition(cond) {
    if(currentUrl.indexOf("cond") < 0)
        history.pushState('Sklep internetowy Pralka', 'Sklep internetowy Pralka', currentUrl + '&cond=' + cond);
    else
    {
        clearCond();
        history.pushState('Sklep internetowy Pralka', 'Sklep internetowy Pralka', clear + '&cond=' + cond);
    }
}