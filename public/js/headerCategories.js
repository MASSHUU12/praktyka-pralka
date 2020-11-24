//When the user clicks on the button,
//toggle between hiding and showing the dropdown content
function headerCategories() 
{
  document.getElementById("header-categories-dropdown-id").classList.toggle("header-hamburger-dropdown-show");
}
  
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) 
{
  if (!event.target.matches("#header-hamburger-dropdown-button")) 
  {
    var dropdowns = document.getElementsByClassName("header-hamburger-dropdown-content");
    var i;

    for (i = 0; i < dropdowns.length; i++) 
    {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('header-hamburger-dropdown-show')) 
        openDropdown.classList.remove('header-hamburger-dropdown-show');
    }
  }
}