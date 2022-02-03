var cloud_name,
  upload_preset,
  video_camera,
  canvas,
  cloudinary_photo,
  streaming = false,
  width = 320,
  height = 0,
  start_camera_button,
  take_picture_button,
  clear_picture_button,
  upload_button,
  video_select,
  upload_response;

function init() {
  console.log("init camera config");
  cloud_name = document.getElementById("cloud_name");
  upload_preset = document.getElementById("upload_preset");
  video_camera = document.getElementById("video_camera");
  canvas = document.getElementById("canvas");
  cloudinary_photo = document.getElementById("cloudinary_photo");
  start_camera_button = document.getElementById("start_camera_button");
  take_picture_button = document.getElementById("take_picture_button");
  clear_picture_button = document.getElementById("clear_picture_button");
  upload_button = document.getElementById("upload_button");
  upload_response = document.getElementById("upload_response");

  start_camera_button.addEventListener("click", startCamera);
  take_picture_button.addEventListener("click", takePhoto);
  clear_picture_button.addEventListener("click", clearPhotos);
  upload_button.addEventListener("click", uploadPhoto);
}

video_select = document.querySelector('select#videoSource');
video_select.onchange = getStream;

// getStream().then(getDevices).then(gotDevices);

function getDevices() {
  // AFAICT in Safari this only gets default devices until gUM is called :/
  return navigator.mediaDevices.enumerateDevices();
}

function gotDevices(deviceInfos) {
  window.deviceInfos = deviceInfos; // make available to console
  for (const deviceInfo of deviceInfos) {
    const option = document.createElement('option');
    option.value = deviceInfo.deviceId;
    option.text = deviceInfo.label || `Camera ${video_select.length + 1}`;
    video_select.appendChild(option);
  }
}

function getStream() {
  if (window.stream) {
    window.stream.getTracks().forEach(track => {
      track.stop();
    });
  }
  const videoSource = video_select.value; 
  const constraints = {
    video: {deviceId: videoSource ? {exact: videoSource} : undefined}
  };
  return navigator.mediaDevices.getUserMedia(constraints).
    then(gotStream).catch(handleError);
}

function gotStream(stream) {
  window.stream = stream; // make stream available to console
  video_select.selectedIndex = [...video_select.options].
    findIndex(option => option.text === stream.getVideoTracks()[0].label);
  videoElement.srcObject = stream;
}

function handleError(error) {
  console.error('Error: ', error);
}

function startCamera(ev) {
  console.log("startCamera");
  navigator.mediaDevices
    .getUserMedia({ video: true, audio: false })
    .then(function (stream) {
      video_camera.srcObject = stream;
      video_camera.play();
      ev.srcElement.disabled = true;
      take_picture_button.disabled = false;
      clear_picture_button.disabled = false;
    })
    .catch(function (err) {
      console.log("An error occurred: " + err);
    });

  video_camera.addEventListener(
    "canplay",
    (ev) => {
      if (!streaming) {
        height = video_camera.videoHeight / (video_camera.videoWidth / width);

        // Firefox currently has a bug where the height can't be read from
        // the video, so we will make assumptions if this happens.
        if (isNaN(height)) {
          height = width / (4 / 3);
        }

        video_camera.setAttribute("width", width);
        video_camera.setAttribute("height", height);

        canvas.setAttribute("width", width);
        canvas.setAttribute("height", height);

        streaming = true;
      }
    },
    false
  );
}

function clearPhotos() {
  var context = canvas.getContext("2d");
  context.fillStyle = "#AAA";
  context.fillRect(0, 0, canvas.width, canvas.height);

  var data = canvas.toDataURL("image/png");
  cloudinary_photo.setAttribute("src", data);
  upload_button.disabled = true;
}

function takePhoto() {
  var context = canvas.getContext("2d");
  if (width && height) {
    canvas.width = width;
    canvas.height = height;
    context.drawImage(video_camera, 0, 0, width, height);
    upload_button.disabled = false;
  } else {
    clearPhotos();
  }
}

function areAllFieldsValid() {
  return cloud_name.value !== "" && upload_preset.value !== "";
}

function uploadPhoto() {
  if (!areAllFieldsValid()) {
    alert("All fields are required");
    return;
  }
  canvas.toBlob((blob) => {
    var formdata = new FormData();
    formdata.append("file", blob);
    formdata.append("upload_preset", upload_preset.value);
    formdata.append("cloud_name", cloud_name.value);

    var xhr = new XMLHttpRequest();
    xhr.open(
      "POST",
      "https://api.cloudinary.com/v1_1/" + cloud_name.value + "/image/upload",
      false
    );

    xhr.onload = function () {
      let response = JSON.parse(this.response);
      cloudinary_photo.setAttribute("src", response.secure_url);
      upload_response.value += this.responseText + "\n";
    };

    xhr.send(formdata);
  });
}

window.onload = init();
