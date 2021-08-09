const videosArea = document.querySelector(".videos-area");
const playVideoBtn = form.querySelector(".play-video-btn");
const videoBox = document.querySelector("#video-box");

form.onsubmit = (e) => {
  e.preventDefault();
};

//Videos

playVideoBtn.onclick = () => {
  // Ajax start
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../processing/insert-video.php", true);
  xhr.onload = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // inputField.value = ""; // after inserting into database the box is blank
        // scrollToBottom();
      }
    }
  };

  let formData = new FormData(videosArea);
  xhr.send(formData);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../processing/get-video.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        videoBox.innerHTML = data;
      }
    }
  };
  let formData = new FormData(videosArea);
  xhr.send(formData);
}, 500);
