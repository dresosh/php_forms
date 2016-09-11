<?php
  $submit        = $_POST['submit'];
  $file          = $_FILES['file'];
  $file_name     = $file['name'];
  $file_size     = $file['size'];
  $file_size     = round($file_size/1000000, 3);
  $file_tmp      = $file['tmp_name'];
  $file_ext      = strtolower(end(explode('.', $file_name)));
  $error         = $file['error'];
  $password      = $_POST['password'];
  $file_name_new = str_replace(' ', '_', $file_name);
  $location      = 'uploads/';
  $restrictions  = ['jpg', 'png', 'pdf', 'php'];
  $img           = ['jpg', 'png'];
  $php           = ['php'];
  $index         = ['index.php'];
  $pdf           = ['pdf'];
  $img_location  = 'uploads/imgs/';
  $php_location  = 'uploads/views/';
  $pdf_location  = 'uploads/pdf/';
  $file_location = '';
?>


<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h1>File Upload</h1>
      <form class="main-form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="file" class="form-control" name="file">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter Password">
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-default">Upload</button>
        </div>
        <?php
        if (isset($submit)) {
          if ($password == 'test') {
            if (in_array($file_ext, $img)) {
              if ($file_size < 4) {
                $file_location = $img_location.$file_name_new;
                if (move_uploaded_file($file_tmp, $img_location.$file_name_new)) {
                  echo '<div class="alert alert-success">File was successfully uploaded</div>';
                } else {
                  echo '<div class="alert alert-danger">There was an error</div>';
                }
              } else {
                echo '<div class="alert alert-danger">File size cannot exceed 4 MB</div>';
              }
            } elseif ($file_name == 'index.php') {
              if ($file_size < 4) {
                $file_location = $location.$file_name_new;
                if (move_uploaded_file($file_tmp, $location.$file_name_new)) {
                  echo '<div class="alert alert-success">File was successfully uploaded</div>';
                } else {
                  echo '<div class="alert alert-danger">There was an error</div>';
                }
              } else {
                echo '<div class="alert alert-danger">File size cannot exceed 4 MB</div>';
              }
            } elseif (in_array($file_ext, $php)) {
              if ($file_size <4) {
                $file_location = $php_location.$file_name_new;
                if (move_uploaded_file($file_tmp, $php_location.$file_name_new)) {
                  echo '<div class="alert alert-success">File was successfully uploaded</div>';
                } else {
                  echo '<div class="alert alert-danger">There was an error</div>';
                }
              } else {
                echo '<div class="alert alert-danger">File size cannot exceed 4 MB</div>';
              }
            } elseif (in_array($file_ext, $pdf)) {
              if ($file_size < 4) {
                $file_location = $pdf_location.$file_name_new;
                if (move_uploaded_file($file_tmp, $pdf_location.$file_name_new)) {
                  echo '<div class="alert alert-success">File was successfully uploaded</div>';
                } else {
                  echo '<div class="alert alert-danger">There was an error</div>';
                }
              } else {
                echo '<div class="alert alert-danger">File size cannot exceed 4 MB</div>';
              }
            } else {
              echo '<div class="alert alert-danger">You can only upload jpg, png, pdf, and php files</div>';
            }
          } else {
            echo '<div class="alert alert-danger">The password you’ve entered is incorrect</div>';
          }
        }
        ?>
      </form>
    </div>
    <div class="col-sm-6">
      <h1>Summary</h1>
      <h4>Filename: </h4><p><?php echo $file_name; ?></p>
      <br><h4>File type: </h4><p><?php echo $file_ext; ?></p>
      <br><h4>File size: </h4><p><?php echo $file_size; ?> MB</p>
      <br><h4>File location: </h4><p><?php echo $file_location; ?></p>
      <br><a href="http://tester.looking.la/uploads"><button type="button" class="btn btn-default">Website</button></a>
      <br><br><a href=<?php $url = 'http://tester.looking.la/'.$file_location; echo $url; ?>><?php if ($password == 'test') { if (in_array($file_ext, $restrictions)) { if ($file_size < 3) { echo '<button type="upload" name="upload" class="btn btn-success">Upload Link</button>'; } } } ?></a>
    </div>
  </div>
</div>
