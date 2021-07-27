const form = document.querySelector('.typing-area'),
inputField = form.querySelector('.input-field'),
sendBtn = form.querySelector('.button'),
chatBox = document.querySelector('.msg-page');

form.onsubmit = (e) => {
  e.preventDefault();
};

sendBtn.onclick = () => {
  // Ajax start
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../processing/insert-chat.php", true);
  xhr.onload = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {        
        inputField.value = ""; // after inserting into database the box is blank
        scrollToBottom();
      }      
    }
  }

  let formData = new FormData(form);
  xhr.send(formData);

};


setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../processing/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);

function scrollToBottom() {
chatBox.scrollTo(0,chatBox.scrollHeight);
}