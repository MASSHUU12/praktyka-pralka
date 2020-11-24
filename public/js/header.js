$(window).on("scroll", function() 
{
    var offset = document.getElementById("header").offsetTop;

    if($(window).scrollTop() > offset) 
    {
        $(".header").addClass("active");
        $(".header-links").addClass("active-links");
        $('#header-hamburger-dropdown-button').addClass("active");
    } 
    else 
    {
       $(".header").removeClass("active");
       $(".header-links").removeClass("active-links");
       $('#header-hamburger-dropdown-button').removeClass("active");
    }
});