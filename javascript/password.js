const pwd = document.querySelector(".form input[type='password']"),
showBtn = document.querySelector(".form .field i");

showBtn.onclick = ()=>{
  if (pwd.type == "password") {
    pwd.type = "text";
    showBtn.classList.add("active");
  }else{
    pwd.type = "password";
    showBtn.classList.remove("active");
  }
}