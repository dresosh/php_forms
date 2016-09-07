<?php

  $to = $_POST['receiver'];
  $from = "From: " .$_POST['sender'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $submit = $_POST['submit'];


  if (isset($submit)) {
    if (strlen($message) > 1 && strlen($to) > 1 && strlen($subject) > 1) {
      mail($to, $subject, $message, $from);
    }
  }

?>


<section class="mailer-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Send a message</h1>
        <form class="" action="" method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="sender" placeholder="Email Sender">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="receiver" placeholder="Email Receiver">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Subject">
          </div>
          <div class="form-group">
            <textarea name="message" rows="8" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-default">Send</button>
            <button type="clear" name="clear" class="btn btn-danger">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="confirmation">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
          <?php
          if (isset($submit)) {
            if (strlen($message) > 1 && strlen($to) > 1 && strlen($subject) > 1) {
              echo "<div class='center alert alert-success'>Your message has been sent!!</div>";
              echo "Your message was sent to " .$to;
            } else {
              echo "<div class='center alert alert-danger'>You need to fill out all fields!!!</div>";
            }
          }
          ?>
      </div>
    </div>
  </div>
</section>
