<?php
  $fileName     = $_FILES["file"]["name"]; // The file name
  $fileTmpLoc   = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder
  $fileType     = $_FILES["file"]["type"]; // File type
  $fileSize     = $_FILES["file"]["size"]; // File size
  $fileErrorMsg = $_FILES["file"]["error"]; // Error message
  $fileLoc      = 'uploads/';


  if (move_uploaded_file($fileTmpLoc, $fileLoc.$fileName)) {
    echo '<div class="alert alert-success">Upload is complete</div>';
  } else {
    echo '<div class="alert alert-danger">Upload Failed</div>';
  }
?>
