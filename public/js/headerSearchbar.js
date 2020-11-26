//When the user clicks on the button,
//toggle between hiding and showing the dropdown content
function headerSearchbar() 
{
  document.getElementById("header-searchbar-dropdown-id").classList.toggle("header-searchbar-dropdown-show");
}
  
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) 
{
  if (!event.target.matches("#header-searchbar-dropdown-button")) 
  {
    var dropdowns = document.getElementsByClassName("header-searchbar-dropdown-content");
    var i;

    for (i = 0; i < dropdowns.length; i++) 
    {
      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('header-searchbar-dropdown-show')) 
        openDropdown.classList.remove('header-searchbar-dropdown-show');
    }
  }
}