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
$test     = explode('-', $file_name);

$allowed =  array( 'pdf', 'jpg', 'html');
$location = 'uploads/';

?>


<section class="data">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <?php
        if (isset($file)) {
          // print_r($file_tmp);
          echo $file_tmp;
          // if (move_uploaded_file($file_tmp, $location.$name)) {
          //   echo "uploaded";
          // } else {
          //   echo "upload failed";
          // }
        }
        ?>
      </div>
      <div class="col-sm-6">
        <h3>
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
