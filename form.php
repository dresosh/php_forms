<?php

  $name = $_POST['name'];
  $email = $_POST['email'];
  $submit = $_POST['submit'];

?>


<section class="message" style="height: 40px;">
  <div class="container">
    <h3>
      <?php include('upload.php'); ?>
    </h3>
  </div>
</section>

<section class="form-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Contact</h1>
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Name" name="name">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
            <button type="clear" name="clear" class="btn btn-danger">Clear</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="results">
  <div class="container">
    <h1>Data</h1>
    <span><h4>Name:</h4></span>
    <span>
      <?php
        if (isset($submit)) {
          if (strlen($name) > 2 && strlen($email) > 1 ) {
            echo $name;
          }
        }
      ?>
    </span>
    <br>
    <span><h4>Email:</h4></span>
    <span>
      <?php
        if (isset($submit)) {
          if (strlen($name) > 2 && strlen($email) > 1 ) {
            echo $email;
          }
        }
      ?>
    </span>
  </div>
</section>
