<?php
$sendto   = "info@hcmsnepal.com";
$name = $_POST['name'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$usermail = $_POST['email'];
$content  = nl2br($_POST['msg']);

$subject  = "Website Enquiry";
$headers = 'From: '.$usermail."\r\n".
 
'Reply-To: '.$usermail."\r\n" .
 
'X-Mailer: PHP/' . phpversion();

$msg .= "New User Feedback\n";
$msg .= "Sent by: ".$usermail."\n";
$msg .= "Name: ".$name."\n";
$msg .= "Country: ".$country."\n";
$msg .= "Phone: ".$phone."\n";
$msg .= "Message: ".$content."\n";

if(@mail($sendto, $subject, $msg, $headers)) {
	echo "true";
} else {
	echo "false";
}

?>