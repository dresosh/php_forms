<?php
  $submit        = $_POST['submit'];
  $file          = $_FILES['file'];
  $file_name     = $file['name'];
  $file_size     = $file['size'];
  $file_size     = round($file_size/1000000, 3);
  $file_tmp      = $file['tmp_name'];
  $file_ext      = strtolower(end(explode('.', $file_name)));
  $error         = $file['error'];
  $file_name_new = explode('.',uniqid('', true))[0].'.'.$file_name;
  $location      = 'uploads/';
  $restrictions  = ['jpg', 'png', 'pdf', 'php', 'html'];
  $url           = 'http://tester.looking.la/'.$location.$file_name;

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
          <button type="submit" name="submit" class="btn btn-default">Send</button>
        </div>
        <?php
        if (isset($submit)) {
          if (in_array($file_ext, $restrictions)) {
            if ($file_size < 3) {
              if (move_uploaded_file($file_tmp, $location.$file_name)) {
                echo '<div class="alert alert-success">File was successfully uploaded</div>';
              } else {
                echo '<div class="alert alert-danger">There was an error</div>';
              }
            } else {
              echo '<div class="alert alert-danger">File size cannot exceed 8mb</div>';
            }
          } else {
            echo '<div class="alert alert-danger">You can only upload jpg, png, pdf, php and html files</div>';
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
      <!-- <br><h4>New Filename: </h4><p><?php if (in_array($file_ext, $restrictions)) { if ($file_size < 3) { echo $file_name_new; } } ?></p> -->
      <br><br><a href=<?php echo $url; ?>><?php if (in_array($file_ext, $restrictions)) { if ($file_size < 3) { echo '<button type="upload" name="upload" class="btn btn-success">Upload Link</button>'; } } ?></a>
    </div>
  </div>
</div>
