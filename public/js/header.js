$(window).on("scroll", function() {
    if($(window).scrollTop() > 10) {
        $(".header").addClass("active");
        $(".header-links").addClass("active-links");
    } else {
       $(".header").removeClass("active");
       $(".header-links").removeClass("active-links");
    }
});