<?php
/*header('Content-Type: application/json');*/
/*header('Access-Control-Allow-Origin : *');*/
$Subject = $_POST['subject'];
$Message = $_POST['message'];
$NameFrom = $_POST['name'];
$EmailFrom = $_POST['email'];

$headers = 'From: '. $NameFrom . "\r\n" .
    'Reply-To: ' . $EmailFrom . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


$Message = wordwrap($Message, 70, "\r\n");


if(mail('jacomig@gmail.com', $Subject, $Message, $headers)){
    echo "Thank you ".$NameFrom." for your message! I will contact you as soon as possible.";
}
?>