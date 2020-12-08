var currentUrl = window.location.href;
var clear;

function byCondition(cond) {
    if(currentUrl.indexOf("cond") < 0)
        history.pushState('Sklep internetowy Pralka', 'Sklep internetowy Pralka', currentUrl + '&cond=' + cond);
    else
    {
        clearCond();
        history.pushState('Sklep internetowy Pralka', 'Sklep internetowy Pralka', clear + '&cond=' + cond);
    }
}

function byBox() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    if(currentUrl.indexOf("sort") < 0)
    {
        history.pushState('Sklep internetowy Pralka', 'Sklep internetowy Pralka', currentUrl + '&sort=' + selectedValue);

        /*
        if(selectedValue == "asc")
            sessionStorage.setItem("selected", "opt2");               

        if(selectedValue == "desc")
            sessionStorage.setItem("selected", "opt3");  
        */             

        window.location.reload(); 
    }
    else
    {
        clearBox();
        history.pushState('Sklep internetowy Pralka', 'Sklep internetowy Pralka', clear + '&sort=' + selectedValue);

        /*
        if(selectedValue == "asc")
            sessionStorage.setItem("selected", "opt2");               

        if(selectedValue == "desc")
            sessionStorage.setItem("selected", "opt3"); 
        */

        window.location.reload(); 
    }
}

/*
document.getElementById("selectBox").onload = function() {
    var opt = localStorage.getItem("selected");

    if(opt == 'opt2')
    {
        var a = document.getElementById("opt2");

        a.setAttribute('selected', true);    
        //a.selected = true;
    }

    if(opt == "op3")
        document.getElementById("opt3").setAttribute('selected', true);
}
*/

function reset() {
    clearCond();
    clearBox();
    history.pushState('Sklep internetowy Pralka', 'Sklep internetowy Pralka', clear);
}

function clearCond() {
    clear = currentUrl.replace("&cond=", "");
    clear = clear.replace("jak%20nowy", "");
    clear = clear.replace("bardzo%20dobry", "");
    clear = clear.replace("dobry", "");
    clear = clear.replace("przeci%C4%99tny", "");
}

function clearBox() {
    clear = clear.replace("&sort=", "");
    clear = clear.replace("asc", "");
    clear = clear.replace("desc", "");
}