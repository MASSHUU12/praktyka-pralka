var images = [
    "app/public/img/1.jpg",
    "app/public/img/2.jpg",
    "app/public/img/3.jpg",
];

var num = 0;

var timer1 = 0;
var timer2 = 0;

function setSlide(nr)
{
    clearTimeout(timer1);
    clearTimeout(timer2);

    slider.src = images[nr - 1];

    changeColor(nr);

    timer2 = setTimeout("changeSlide()", 5000);
}

function changeSlide()
{
    num++;

    if(num > 3)
        num = 1;

    slider.src = images[num-1];

    changeColor(num);

    timer1 = setTimeout("changeSlide()", 5000);
}

function changeColor(number)
{
    if (number == 1)
    {
        document.getElementById("main-banner-button1").style.color = "#386863"; 
        document.getElementById("main-banner-button2").style.color = "#c5eae6";   
        document.getElementById("main-banner-button3").style.color = "#c5eae6";      
    }
    else if (number == 2)
    {
        document.getElementById("main-banner-button1").style.color = "#c5eae6"; 
        document.getElementById("main-banner-button2").style.color = "#386863";   
        document.getElementById("main-banner-button3").style.color = "#c5eae6";   
    }
    else
    {
        document.getElementById("main-banner-button1").style.color = "#c5eae6"; 
        document.getElementById("main-banner-button2").style.color = "#c5eae6";   
        document.getElementById("main-banner-button3").style.color = "#386863";   
    }
}