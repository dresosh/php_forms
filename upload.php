<?php
  $fileName     = $_FILES["file1"]["name"]; // The file name
  $fileTmpLoc   = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
  $fileType     = $_FILES["file1"]["type"]; // File type
  $fileSize     = $_FILES["file1"]["size"]; // File size
  $fileErrorMsg = $_FILES["file1"]["error"]; // Error message
  $fileLoc      = 'uploads/';


  if (move_uploaded_file($fileTmpLoc, $fileLoc.$fileName)) {
    echo '<div class="alert alert-success">Upload is complete</div>';
  } else {
    echo '<div class="alert alert-danger">Upload Failed</div>';
  }
?>
