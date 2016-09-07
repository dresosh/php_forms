<?php
  if (isset($submit)) {
    if ($name == '' || $email == '') {
      echo "<div class='red'>Please fill out all fields!</div>";
    } elseif (strlen($name) < 3 ) {
      echo "<div class='red'>Your name needs to be at least 3 characters long!</div>";
    } else {
      echo "<div class='green'>Thank You for your submission!</div>";
    }
  } else {
    echo "Please fill out the fields below!";
  }
?>
