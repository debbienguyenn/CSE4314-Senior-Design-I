const videosArea = document.querySelector(".videos-area");
const playVideoBtn = videosArea.querySelectorAll(".play-video-btn");
const videoBox = document.querySelector("#video-box");
const streamBtn = document.querySelector("#stream");

//Videos

for (let i = 0; i < playVideoBtn.length; i++)
  playVideoBtn[i].onclick = () => {
    {
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
      for (var value of formData.entries()) {
        console.log(value);
      }
      xhr.send(formData);
    }
  };

// playVideoBtn.onclick = () => {
//   // Ajax start
//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", "../processing/insert-video.php", true);
//   xhr.onload = function () {
//     if (xhr.readyState === 4) {
//       if (xhr.status === 200) {
//         // inputField.value = ""; // after inserting into database the box is blank
//         // scrollToBottom();
//       }
//     }
//   };

//   let formData = new FormData(videosArea);
//   for (var value of formData.entries()) {
//     console.log(value);
//   }
//   xhr.send(formData);
// };

streamBtn.onclick = () => {
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
};
// setInterval(() => {
//   let xhr = new XMLHttpRequest();
//   xhr.open("POST", "../processing/get-video.php", true);
//   xhr.onload = () => {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//       if (xhr.status === 200) {
//         let data = xhr.response;
//         videoBox.innerHTML = data;
//       }
//     }
//   };
//   let formData = new FormData(videosArea);
//   xhr.send(formData);
// }, 10000);

// $(document).ready(function () {
//   $("#stream").click(function () {
//     $("#video-box").load("../processing/get-video.php");
//   });
// });
