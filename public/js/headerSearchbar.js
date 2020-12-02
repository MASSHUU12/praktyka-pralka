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
      var num = 0;
      searchArray = suggestions.filter((data)=> {
        return data.toLocaleLowerCase().match(inputValue.toLocaleLowerCase());
      });
      searchArray = searchArray.map((data)=> {
        num++;
        return data = '<p id="data' + num + '">'+ data +'</p>';
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

function completeSearch()
{
  var searchbar = document.getElementById("header-searchbar-dropdown-button");

  var r1 = document.getElementById("data1");
  var r2 = document.getElementById("data2");
  var r3 = document.getElementById("data3");
  var r4 = document.getElementById("data4");
  var r5 = document.getElementById("data5");
  var r6 = document.getElementById("data6");
  var r7 = document.getElementById("data7");
  var r8 = document.getElementById("data8");
  var r9 = document.getElementById("data9");

  r1.onclick = function() {
    searchbar.value = r1.innerHTML;
  }
  r2.onclick = function() {
    searchbar.value = r2.innerHTML;
  }
  r3.onclick = function() {
    searchbar.value = r3.innerHTML;
  }
  r4.onclick = function() {
    searchbar.value = r4.innerHTML;
  }
  r5.onclick = function() {
    searchbar.value = r5.innerHTML;
  }
  r6.onclick = function() {
    searchbar.value = r6.innerHTML;
  }
  r7.onclick = function() {
    searchbar.value = r7.innerHTML;
  }
  r8.onclick = function() {
    searchbar.value = r8.innerHTML;
  }
  r9.onclick = function() {
    searchbar.value = r9.innerHTML;
  }
}