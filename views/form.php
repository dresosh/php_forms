<?php
  $from     = $_POST['from'];
  $to       = $_POST['to'];
  $subject  = $_POST['subject'];
  $message  = wordwrap($_POST['message'], 100);
  $password = $_POST['password'];
  $submit   = $_POST['submit'];
  $answer   = 'ITEM9';
  $weak     = ['password', '123456', 'letmein', 'abc123', '696969', '123' ,'fuckyou', 'fucku'];
  $guess    = ['wutang', 'WUTANG', 'wu-tang', 'WU-TANG', 'skate', 'item9'];
  $safe     = ['andre@looking.la', 'contact@dresosh.com', 'dre@item9creative.com']
?>

<section class="spammer-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Spammer</h1>
        <form method="post">
          <div class="form-group">
            <input type="email" name="from" class="form-control" placeholder="From">
          </div>
          <div class="form-group">
            <input type="email" name="to" class="form-control" placeholder="To">
          </div>
          <div class="form-group">
            <input type="text" name="subject" class="form-control" placeholder="Subject">
          </div>
          <div class="form-group">
            <textarea name="message" rows="10" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success">Send</button>
            <button type="reset" name="reset" class="btn btn-warning">Clear All</button>
            <button type="clear" name="clear" class="btn btn-danger">Reset</button>
          </div>
        </form>
        <?php
          if (isset($submit)) {
            if (!empty($password)) {
              if ($password == $answer) {
                if (!empty($to) && !empty($from) && !empty($message)) {
                  if (in_array($from, $safe)) {
                    echo '<div class="alert alert-danger">You cannot send emails from this email address</div>';
                  } elseif (in_array($to, $safe)) {
                    echo '<div class="alert alert-danger">You cannot send emails to this email address</div>';
                  } else {
                    mail($to, $subject, $message, "From: ".$from);
                    echo '<div class="alert alert-success">Your message was sent</div>';
                  }
                } else {
                  echo '<div class="alert alert-danger">All fields must be filled out to send a message</div>';
                }
              } elseif (in_array($password, $guess)) {
                echo '<div class="alert alert-danger">Not bad! You must know the developer who made this! But still NO</div>';
              } elseif (in_array($password, $weak)) {
                echo '<div class="alert alert-danger">Come on really?? You gotta try better than that</div>';
              } else {
                echo '<div class="alert alert-danger">The password you have entered is incorrect</div>';
              }
            } else {
              echo '<div class="alert alert-danger">You must enter a password to send a message</div>';
            }
          }
        ?>



      </div>


      <div class="col-sm-6">
        <h1>Receipt</h1>
        <h4>from:</h4><p><?php echo $from; ?></p>
        <br><h4>to:</h4><p><?php echo $to; ?></p>
        <br><h4>subject:</h4><p><?php echo $subject; ?></p>
        <br><h4>message:</h4><p><?php echo $message; ?></p>
      </div>
    </div>
  </div>
</section>
