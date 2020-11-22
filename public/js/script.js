var number = 0;
var timer1 = 0;
var timer2 = 0;

/*
function setSlide(nSlide)
{
    clearTimeout(timer1);
    clearTimeout(timer2);

    number = nSlide - 1;

    hide();

    setTimeout("changeSlide()", 500);
}
*/

function hide()
{
    $("#slider").fadeOut(500);
}

function changeSlide()
{
    number++;

    if (number > 5)
        number = 1;
    
    var image = '<img class="banner" src="/app/public/img/' + number + '.jpg" />';

    document.getElementById("slider").innerHTML = image;
    $("#slider").fadeIn(500);

    timer1 = setTimeout("changeSlide()", 5000);
    timer2 = setTimeout("hide()", 4500);
}