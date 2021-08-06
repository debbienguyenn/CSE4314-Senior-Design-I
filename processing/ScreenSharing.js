const videoElem = document.getElementById("video");
const logElem = document.getElementById("log");
const startElem = document.getElementById("start");
const stopElem = document.getElementById("stop");

// Options for getDisplayMedia()

var displayMediaOptions = {
  video: {
    cursor: "always",
  },
  audio: false,
};

// Set event listeners for the start and stop buttons
startElem.addEventListener(
  "click",
  function (evt) {
    startCapture();
  },
  false
);

stopElem.addEventListener(
  "click",
  function (evt) {
    stopCapture();
  },
  false
);

console.log = (msg) => (logElem.innerHTML += `${msg}<br>`);
console.error = (msg) =>
  (logElem.innerHTML += `<span class="error">${msg}</span><br>`);
console.warn = (msg) =>
  (logElem.innerHTML += `<span class="warn">${msg}<span><br>`);
console.info = (msg) =>
  (logElem.innerHTML += `<span class="info">${msg}</span><br>`);

async function startCapture() {
  logElem.innerHTML = "";

  try {
    video.srcObject = await navigator.mediaDevices.getDisplayMedia(
      displayMediaOptions
    );
  } catch (err) {
    console.error("Error: " + err);
  }
}

function stopCapture(evt) {
  let tracks = videoElem.srcObject.getTracks();

  tracks.forEach((track) => track.stop());
  videoElem.srcObject = null;
}

$(document).ready(function () {
  document.getElementById("start").click();
  function triggerClick() {
    var event = new MouseEvent("click", {
      view: window,
      bubbles: true,
      cancelable: true,
    });
    var cb = document.querySelector("input[type=submit][name=btnK]");
    var canceled = !cb.dispatchEvent(event);
    if (canceled) {
      // preventDefault was called and the event cancelled
    } else {
      // insert your event-logic here...
    }
  }
});
