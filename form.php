<?php

$file = $_FILES['file'];
$file_name = $file['name'];
$file_size = $file['size'];
$file_type = $file['type'];
$file_error = $file['error'];
$file_tmp = $file['tmp_name'];
$submit = $_POST['submit'];

// Work out file extension
$file_ext = explode('.', $file_name);
$file_ext = strtolower(end($file_ext));

$allowed =  array( 'pdf', 'jpg', 'html');

?>


<section class="data">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h3>
          <?php
          ?>
        </h3>
      </div>
    </div>
  </div>
</section>

<section class="download">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h2>File Upload</h2>
        <form class="form-upload" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="file" name="file" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-default">Upload</button>
          </div>
        </form>

        <?php
          if (isset($file)) {
            if (in_array($file_ext, $allowed)) {
              if ($file_error === 0) {
                if ($file_size <= 20000000) {
                  $file_name_new = uniqid('', true) . '.' . $file_ext;
                  $file_destination = 'uploads/' . $file_name_new;

                  if (move_uploaded_file($file_tmp, $file_destination)) {
                    // echo $file_destination;
                    echo '<div style="text-transform: uppercase;" class="center alert alert-success">file was successfully uploaded <br> click to see <a href="http://tester.looking.la/'.$file_destination.'">File Destination</a></div>';
                  } else {
                    echo '<div style="text-transform: uppercase;" class="center alert alert-danger">file was not uploaded</div>';
                  }
                }
              }
            } else {
              echo '<div style="text-transform: uppercase;" class="center alert alert-danger">You can only upload pdf, html and jpg files</div>';
            }
          }
        ?>
      </div>
      <div class="col-sm-6">
        <h2>File Summary</h2>
        <h5>File name: <?php echo $file_name; ?> </h5>
        <h5>File size: <?php echo $file_size/1000; ?> KB</h5>
        <h5>File type: <?php echo $file_ext; ?></h5>
        <h5>File name in uploads folder: <?php echo $file_name_new; ?></h5>
      </div>
    </div>
  </div>
</section>
