<section class="message" style="height: 50px;">
  <div class="container">
    <h3>
      <?php

      $name = $_POST['name'];

      if (isset($_POST['submit'])) {
        if ($name == '') {
          echo '<div style="color:red">Please enter a name!</div>';
        } elseif (strlen($name) < 3 ) {
          echo '<div style="color:red">You name must be at least 3 characters long</div>';
        } else {
          echo '<div style="color: green">Thank you for your submission!!!</div>';
        }
      } else {
        echo "Please enter the information below";
      }
      ?>
    </h3>
  </div>
</section>


<section class="contact-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Contact Form</h1>
        <form method="post">
          <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <button class="btn btn-default" type="submit" name="submit">Submit</button>
            <button class="btn btn-danger" type="clear" name="clear">Clear</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="results">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Data</h1>
        <span>Name: </span>
        <span>
          <?php

          $name = $_POST['name'];

          if (isset($_POST['submit'])) {
            if (strlen($name) > 2) {
              echo $name;
            }
          }
          ?>
        </span>
        <br>
        <span>Email:</span>
        <span>
          <?php

          $email = $_POST['email'];

          if (isset($_POST['submit'])) {
            echo $email;
          }

          ?>
        </span>
      </div>
    </div>
  </div>
</section>
