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
