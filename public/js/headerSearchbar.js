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

  document.getElementById("header-searchbar-dropdown-id").style.display = "block"; //to jest aby znowu się wyswietlily wyniki gdy wczesniej klikniesz jakis

    if(inputValue) {
      var num = 0;
      searchArray = suggestions.filter((data)=> {
        return data.toLocaleLowerCase().match(inputValue.toLocaleLowerCase());
      });
      searchArray = searchArray.map((data)=> {
        num++;
        return data = '<p id="data' + num + '" onclick="completeSearch('+ num +')">'+ data +'</p>';
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
  completeSearch();
}

function completeSearch(num)
{
  var searchbar = document.getElementById("header-searchbar-dropdown-button");

  searchbar.value = document.getElementById("data"+ num).innerHTML;
  document.getElementById("header-searchbar-dropdown-id").style.display = "none";
}