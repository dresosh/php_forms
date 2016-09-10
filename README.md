# Creating PHP Forms

## Basic contact Form
#### HTML CODE


When builing the HTML form, it is important that each field has a name property so that the value can be grabbed.

```
<form class="basic-form" action="" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </div>
</form>
```

#### PHP CODE

```
<?php
  // Field Variables
  $name    = $_POST['name'];
  $email   = $_POST['email'];
  $submit  = $_POST['submit'];

  // Mail Variables
  $to      = 'andre@looking.la';
  $from    = 'From: admin@looking.la';
  $subject = 'Avion form signup';
  $message = 'From: ' .$name."\n". 'Email: ' .$email."\n". 'Company: ' .$company."\n". 'Industry: ' .$options."\n";



  if (isset($submit)) {
    if (!empty($name) && !empty($email)) {
      mail($to, $subject, $message, $from);
    }
  }


?>
```
#### Creating Variables and Grabbing DOM Values
Variables in PHP are created with the `$` sign.
A PHP Variable looks like this `$variable`.

Data from an input field are generally grabbed with the `$_POST[]` request. Inside the squared brackets goes the name Variable that corresponds with the name fields that is in the DOM.

So if you wanted the value of the Name input field. You will have to enter name inside the post brackets.

Example: `$_POST['name']`.

#### Sending Mail

To send data via your php form. You will need to use the `mail()` function.

```
mail(to,subject,message,headers,parameters);
```

The mail function takes in all the parameters that should be included in the email.

#### Creating Mail body

To create the actual body for your email, it is best to create a variable which you can name `$message` or `$body`, and that variable contains all the information that you want to be inside the email.

Example: `$message = 'From: ' .$name."\n". 'Email: ' .$email."\n";`

The `"\n"` notation is equivalent to a hard return.

#### Installing reCAPTCHA

Paste this snippet before the closing `</head>` tag on your HTML template:

```
<script src='https://www.google.com/recaptcha/api.js'></script>
```

Paste this snippet at the end of the `<form>` where you want the reCAPTCHA widget to appear:
```
<div class="g-recaptcha" data-sitekey="6LdBtikTAAAAACwgEiLrCQXN7I-uNCepReqT0MQ2"></div>
```

Create variables for your secret, response, and remoteip. Those variables are then plugged in the url that is used for verification.

Example:

```
https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip
```


```
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
```

## PHP File Upload

HTML CODE
```
<form class="" method="post" enctype="multipart/form-data">
  <br>
  <div class="form-group col-sm-6">
    <input type="file" name="file" class="form-control">
  </div>
  <div class="form-group">
    <button type="submit" name="submit" class="btn">Submit</button>
  </div>
</form>
```
The most important thing to know when dealing with file uploads, is to add `enctype="multipart/form-data"` to the form. Otherwise it is impossible for the php form to grab the data from the input fields.

The input file tag is used to upload files to the server. The PHP method used to grab the input fields content is called `$_FILES['']`. When you use the file input field and submit the form, you will get array back with the following data.

```
Array ( [name] => [type] => [tmp_name] => [error] => 4 [size] => 0 )
```

Within that array is a tmp_name which is essentially a temp location where the file gets moved to. Once the file is in that location you will use `move_uploaded_file()`


#### Useful functions to use dealing with forms
`empty()` This function is useful to determine if a fields is empty.

`explode()` Splits a string by defined symbol and returns array

`in_array( mixed $needle , array $haystack [, bool $strict = FALSE ])` Searches for items in the array

`uniqid('', ture)` Gets a prefixed unique identifier based on the current time in microseconds

`strtolower()` Will change a string to lower case

`strlen()` Will return string length

#### Helpful video tutorials
```
PHP File upload https://www.youtube.com/watch?v=PRCobMXhnyw
```
