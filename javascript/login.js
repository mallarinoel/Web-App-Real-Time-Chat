const frm = document.querySelector(".Login form");
const btnSignUp = document.querySelector(".button input");
const notif = document.querySelector(".error-notification");

frm.onsubmit = (e)=> {
  e.preventDefault();
}

btnSignUp.onclick = ()=> {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = ()=> {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
       if (data != "Success") {
          notif.textContent = data;
          notif.style.display = "block";
        } else {
          window.location.href = "/dashboard.php"
        }
      }
    }
  }
  let frmData = new FormData(frm);
  xhr.send(frmData);
}