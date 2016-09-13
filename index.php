 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Form test</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style media="screen">
      body {
        color: #fff;
        background: #343434;
        /*background-image: url('./imgs/bg.jpg');*/
        background-size: cover;
        background-repeat: no-repeat;
      }
      h4, p {
        display: inline-block;
      }
      h4 {
        width: 100px;
        text-transform: uppercase;
      }
      .alert {
        text-transform: uppercase;
        text-align: center;
      }

      .dropzone {
        width: 400px;
        height: 400px;
        border: 2px dashed white;
        text-align: center;
        position: relative;
        border-radius: 10px;
      }

      .dropzone p {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .dropzone.dragover {
        color: red;
        border-color: red;
      }
    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>

    <?php include('views/form.php') ?>


    <script type="text/javascript">
      (function() {
        var dropzone = document.getElementById('dropzone');

        var displayUploads = function (data) {
          var uploads = document.getElementById('uploads'),
              anchor,
              x;

              for (x = 0; x < data.length; x = x + 1) {
                anchor = document.createElement('a');
                anchor.href = data[x].file;
                anchor.innerText = data[x].name;

                uploads.appendChild(anchor);
              }
        }

        var upload     = function (files) {

          var formData = new FormData()
             ,xhr      = new XMLHttpRequest()
             ,x;

          for (x = 0; x < files.length; x = x + 1) {
            formData.append('file[]', files[x]);
          }

          xhr.onload = function() {
            var data = JSON.parse(this.responseText);
            console.log(data);
            // displayUploads(data);
          }
          xhr.open('post', 'upload.php');
          xhr.send(formData);
        }

        dropzone.ondrop = function (e) {
          e.preventDefault();
          this.className = 'dropzone'
          upload(e.dataTransfer.files);
        }

        dropzone.ondragover = function () {
          this.className = 'dropzone dragover';
          return false;
        }

        dropzone.ondragleave = function () {
          this.className = 'dropzone';
          return false;
        }

      }())
    </script>
  </body>
</html>
