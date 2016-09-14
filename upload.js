function _(el) {
  return document.getElementById(el);
}

function uploadFile() {
  var file = _("file").files[0];

  // Checking if file is loaded
  if (file == undefined) {
    _("status").innerHTML = '<div class="alert alert-danger">You need to load a file</div>';
  } else {
    console.log(file);
    var formdata = new FormData()
       ,ajax     = new XMLHttpRequest()

    formdata.append("file", file)

    // Ajax call
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.open("POST", "upload.php");
    ajax.send(formdata);
  }
}

function clear_status() {
  _("progressBar").value = 0;
  _("prog-message").innerHTML = 'Upload Status: ' + 0 + '%';
}

function progressHandler(event) {
  var percent = (event.loaded / event.total) * 100
     ,file    = _("file").files[0];

  _("progressBar").value = Math.round(percent);
  _("prog-message").innerHTML = 'Upload Status: ' + Math.round(percent) + '%';
  _("name").innerHTML = file.name;
  _("type").innerHTML = file.type.split("/")[1];
  _("size").innerHTML = file.size / 1000000 ;
}

function completeHandler(event) {
  _("status").innerHTML = event.target.responseText;
}
