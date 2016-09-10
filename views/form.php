<?php
  // Field Variables
  $to      = $_POST['to'];
  $from    = "From: ".$_POST['from'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $message = wordwrap($message, 100);
  $submit  = $_POST['submit'];

  // Recaptcha
  $secret   = '6LdGuCkTAAAAAMdJKIdX5SfIeZiTEJMWHmCwr2sR';
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $url      = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
  $result   = json_decode($url, true);
  $result   = $result['success'];

  if (isset($submit)) {
    if ($result == 1) {
      if (!empty($to) && !empty($from) && !empty($message)) {
        mail($to, $subject, $message, $from);
      }
    }
  }
?>


<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h1>Prank Responsibly</h1>
      <form class="main-form" method="post">
        <div class="form-group">
          <input type="email" class="form-control" name="from" placeholder="From">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="to" placeholder="To">
        </div>
        <div class="form-group">
          <input type="test" class="form-control" name="subject" placeholder="Subject">
        </div>
        <div class="form-group">
          <textarea name="message" rows="8" class="form-control" placeholder="Message"></textarea>
        </div>
        <div class="form-group">
          <div class="g-recaptcha" data-sitekey="6LdGuCkTAAAAALGI4ea25gOtw3PhG1AjbxPEmzCf"></div>
          <br>
          <button type="submit" name="submit" class="btn btn-default">Submit</button>
          <button type="reset" name="reset" class="btn btn-primary">Clear All</button>
          <button type="clear" name="clear" class="btn btn-danger">Reset</button>
        </div>
      </form>
    </div>
    <div class="col-sm-6">
        <?php
        if (isset($submit)) {
          if (!empty($message)) {
            echo '<h1>Copy</h1>';
            echo '<h4 style="text-transform: uppercase;">from:</h4>' . '<h5>'.$from.'</h5>';
            echo '<br><h4 style="text-transform: uppercase;">to:</h4>' . '<h5>'.$to.'</h5>';
            echo '<br><h4 style="text-transform: uppercase;">subject:</h4>' . '<h5>'.$subject.'</h5>';
            echo '<br><h4 style="text-transform: uppercase;">message:</h4>' . '<h6>'.$message.'</h6>';
          }
        }
        ?>
    </div>
  </div>
</div>







<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <?php
        if (isset($submit)) {
          if ($result == 1) {
            if (!empty($to) && !empty($from) && !empty($message)) {
              echo '<div style="text-transform: uppercase;" class="center alert alert-success">Your message was sent to '.$to.'</div>';
            } else {
              echo '<div style="text-transform: uppercase;" class="center alert alert-danger">You need to fill out all fields</div>';
            }
          } else {
            echo '<div style="text-transform: uppercase;" class="center alert alert-danger">You need to prove that you are not a robot</div>';
          }
        }
      ?>
    </div>
  </div>
</div>

<div class="container">



</div>
