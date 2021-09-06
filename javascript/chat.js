const frm = document.querySelector(".typing-area"),
msg = frm.querySelector(".message"),
btnSend = frm.querySelector("button"),
msgBox = document.querySelector(".user-chat-box");

frm.onsubmit = (e)=> {
  e.preventDefault();
}

btnSend.onclick = ()=> {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/chat.php", true);
  xhr.onload = ()=> {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        msg.value = "";
        scrollToBottom();
      }
    }
  }
  let frmData = new FormData(frm);
  xhr.send(frmData);
}

msgBox.onmouseenter = ()=> {
  msgBox.classList.add("active");
}

msgBox.onmouseleave = ()=> {
  msgBox.classList.remove("active");
}

setInterval(()=> {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/message.php", true);
  xhr.onload = ()=> {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        msgBox.innerHTML = data;
        if (!msgBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  }
  let frmData = new FormData(frm);
  xhr.send(frmData);
}, 500);

function scrollToBottom() {
  msgBox.scrollTop = msgBox.scrollHeight;
}