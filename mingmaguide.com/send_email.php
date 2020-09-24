<?php

//we need to get our variables first

$email_to = 'arun.daduwa.ad@gmail.com'; //the address to which the email will be sent
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$howhear = $_POST['howhear'];
$message = $_POST['message'];

/* the $header variable is for the additional headers in the mail function,
  we are asigning 2 values, first one is FROM and the second one is REPLY-TO.
  That way when we want to reply the email gmail(or yahoo or hotmail...) will know
  who are we replying to. */
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

$mail_msg .= 'From: ' . $name . "\n";
$mail_msg .= 'Email: ' . $email . "\n";
$mail_msg .= 'Phone: ' . $phone . "\n";
$mail_msg .= 'Subject: ' . $subject . "\n";
$mail_msg .= 'How did you hear about us?: ' . $howhear . "\n";
$mail_msg .= 'Message: ' . $message . "\n";

if (mail($email_to, $subject, $mail_msg, $headers)) {
    echo 'sent'; // we are sending this text to the ajax request telling it that the mail is sent..      
} else {
    echo 'failed'; // ... or this one to tell it that it wasn't sent    
}
?>