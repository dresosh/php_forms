<?php
// Message
$msg = 'This is a test email';

// Wordwrap
$msg = wordwrap($msg, 70);

// Sender
$from = "From: " .'wutang@wutang.com';

// Sending Email
mail("andre@looking.la", "Test Subject", $msg, $from);
?>

<?php
   $name = $_FILES['file']['name'];
  //  $size = $_FILES['file']['size'];
  //  $type = $_FILES['file']['type'];

   $tmp_name = $_FILES['file']['tmp_name'];

  //  $error = $_FILES['file']['error'];

  if (isset($name)) {
    if ( !empty($name)) {

      $location = 'uploads/';

      if (move_uploaded_file($tmp_name, $location.$name)) {
        echo 'Uploaded';
      }

    } else {
      echo 'Please Choose a file';
    }
  }
?>
