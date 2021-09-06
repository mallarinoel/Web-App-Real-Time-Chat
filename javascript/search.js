const searchBar = document.querySelector(".user-dashboard .user-search input[type='text']"),
BtnSearch = document.querySelector(".user-dashboard .user-search button"),
userList = document.querySelector(".user-dashboard .user-list");

BtnSearch.onclick = ()=> {
  BtnSearch.classList.toggle("active");
  searchBar.classList.toggle("active");
  searchBar.focus();
}

searchBar.onkeyup = ()=> {
  let searchUser = searchBar.value;
  if(searchUser != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=> {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        userList.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchUser);
}

setInterval(()=> {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/dashboard.php", true);
  xhr.onload = ()=> {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if(!searchBar.classList.contains("active")){
        userList.innerHTML = data;
        }
      }
    }
  }
  xhr.send();
}, 500);