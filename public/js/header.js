$(window).on("scroll", function() 
{
    var offset = document.getElementById("header").offsetTop;

    if($(window).scrollTop() > offset) 
    {
        $(".header").addClass("active");
        $(".header-links").addClass("active-links");
        $(".logo").addClass("logo-active");
        $('#header-hamburger-dropdown-button').addClass("active-links");
    } 
    else 
    {
       $(".header").removeClass("active");
       $(".header-links").removeClass("active-links");
       $(".logo").removeClass("logo-active");
       $('#header-hamburger-dropdown-button').removeClass("active-links");
    }
});