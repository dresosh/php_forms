<div class="container">
  <form class="" method="post" enctype="multipart/form-data">
    <br>
    <div class="form-group col-sm-6">
      <input type="file" name="file" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" name="submit" class="btn">Submit</button>
    </div>
  </form>
</div>

<div class="container">
  <?php
    $submit = $_POST['submit'];
    $file = $_FILES['file'];

    if (isset($submit)) {
      print_r($file);
      
    }
  ?>
</div>
