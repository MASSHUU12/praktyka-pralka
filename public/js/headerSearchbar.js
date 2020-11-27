const suggestions = [
  'Pralka',
  'Suszarka',
  'Lodówka',
  'Kuchenka',
  'Zmywarka',
  'Czajnik',
  'Ekspres do kawy',
  'Odkurzacz',
  'Żelazko',
];

const container = document.querySelector(".header-search-container");
const searchbarInput = container.querySelector("input");
const searchbarResults = container.querySelector(".header-searchbar-dropdown-content");

searchbarInput.onkeyup = (e)=>{
  let inputValue = e.target.value;
  let searchArray = [];
    if(inputValue) {
      searchArray = suggestions.filter((data)=> {
        return data.toLocaleLowerCase().match(inputValue.toLocaleLowerCase());
      });
      searchArray = searchArray.map((data)=> {
        return data = '<p>'+ data +'</p>';
      });
      console.log(searchArray);
      searchbarResults.classList.add("header-searchbar-dropdown-show");
    }
    showSuggestions(searchArray);
}

function showSuggestions(list){
  let listData;
  if(!list){

  }
  else {
    listData = list.join('');
  }
  searchbarResults.innerHTML = listData;
  
}

// //When the user clicks on the button,
// //toggle between hiding and showing the dropdown content
// function headerSearchbar() 
// {
//   document.getElementById("header-searchbar-dropdown-id").classList.toggle("header-searchbar-dropdown-show");
// }
  
// // Close the dropdown menu if the user clicks outside of it
// window.onclick = function(event) 
// {
//   if (!event.target.matches("#header-searchbar-dropdown-button")) 
//   {
//     var dropdowns = document.getElementsByClassName("header-searchbar-dropdown-content");
//     var i;

//     for (i = 0; i < dropdowns.length; i++) 
//     {
//       var openDropdown = dropdowns[i];

//       if (openDropdown.classList.contains('header-searchbar-dropdown-show')) 
//         openDropdown.classList.remove('header-searchbar-dropdown-show');
//     }
//   }
// }