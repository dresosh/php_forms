<?php

$file = $_FILES['file'];
$file_name = $file['name'];
$file_size = $file['size'];
$file_type = $file['type'];
$file_error = $file['error'];
$file_tmp = $file['tmp_name'];
$submit = $_POST['submit'];

if (isset($file)) {

  // Work out file extension
  $file_ext = explode('.', $file_name);
  $file_ext = strtolower(end($file_ext));

  $allowed =  array( 'png', 'jpg');

  if (in_array($file_ext, $allowed)) {
    if ($file_error === 0) {
      if ($file_size <= 20000000) {
        $file_name_new = uniqid('', true) . '.' . $file_ext;
        $file_destination = 'uploads/' . $file_name_new;

        if (move_uploaded_file($file_tmp, $file_destination)) {
          echo $file_destination;
        } else {
          echo "file was not uploaded";
        }
      }
    }
  }

}


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
      </div>
    </div>
  </div>
</section>

<section class="info-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h3>Summary</h3>
        <h5>File: <?php echo $file_name; ?> </h5>
        <h5>Size: <?php echo $file_size/1000; ?> KB</h5>
        <h5>Kind: <?php echo $file_type; ?></h5>
      </div>
    </div>
  </div>
</section>
