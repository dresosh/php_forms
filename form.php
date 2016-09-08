<?php
  // Variables
  $name    = $_POST['name'];
  $email   = $_POST['email'];
  $company = $_POST['company'];
  $options = $_POST['options'];
  $submit  = $_POST['submit'];
  $to      = 'andre@looking.la';
  $from    = 'From: admin@looking.la';
  $subject = 'Avion form signup';
  $message = 'From: ' .$name."\n". 'Email: ' .$email."\n". 'Company: ' .$company."\n". 'Industry: ' .$options."\n";

  // Recaptcha Data
  $secret   = '6LdBtikTAAAAAKMonFkh2GkaFU26k8jTPw6fwFJt';
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $url      = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
  $result   = json_decode($url, true);
  $result   = $result['success'];


  if (isset($submit)) {
    if ($result == 1) {
      if (!empty($name) && !empty($email)) {
        mail($to, $subject, $message, $from);
      }
    }
  }


?>

<section class="form-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Avion Signup</h1>
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="company" placeholder="Company">
          </div>
          <div class="form-group">
            <select class="form-control" name="options">
              <option value="real">Real Estate</option>
              <option value="press">Press</option>
              <option value="Design">Design</option>
            </select>
          </div>
          <div class="g-recaptcha" data-sitekey="6LdBtikTAAAAACwgEiLrCQXN7I-uNCepReqT0MQ2"></div>
          <br>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
            <button type="clear" name="clear" class="btn btn-primary">Clear</button>
            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="document-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <?php
          if (isset($submit)) {
            if ($result == 1) {
              if (!empty($name) && !empty($email)) {
                if (strlen($name) > 2 ) {
                  echo '<div class="center alert alert-success">Thanks you for your submission! <br>  Click <a href="looking.la" download>Floorplans</a> to download!</div>';
                } else {
                  echo '<div class="center alert alert-danger">Your name need to be at least 3 characters long!</div>';
                }
              } else {
                echo '<div class="center alert alert-danger">You need to fill out all fields!</div>';
              }
            } else {
              echo '<div class="center alert alert-danger">You need to prove you are not a bot!</div>';
            }
          }
        ?>
      </div>
    </div>
  </div>
</section>
