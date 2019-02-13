<?php
/*header('Content-Type: application/json');*/
/*header('Access-Control-Allow-Origin : *');*/
$Subject = $_POST['subject'];
$MessageFrom = $_POST['message'];
$NameFrom = $_POST['name'];
$EmailFrom = $_POST['email'];

$headers = "From: jacopomigliorelli@jacopomigliorelli.com \r\n" .
    "Reply-To: " . $EmailFrom . "\r\n" .
    "X-Mailer: PHP/" . phpversion();
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "To: jacomig@gmail.com\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";    

//$Message = "<p>You received a message from ". $NameFrom ."<br>". "Reply to: ". $EmailFrom . "<br>";
$Message = wordwrap($MessageFrom, 70, "<br>");

if(mail('jacomig@gmail.com', $Subject, $Message, $headers)){
    echo "The email to admin was successfully sent from ".$EmailFrom."";
}

$headersCustomer = "From: jacopomigliorelli@jacopomigliorelli.com \r\n" .
    "Reply-To: jacomig@gmail.com \r\n" .
    'X-Mailer: PHP/' . phpversion();
$headersCustomer .= "MIME-Version: 1.0" . "\r\n";
$headersCustomer .= "Content-type:text/html;charset=UTF-8" . "\r\n";       

$subjectToCustomer = "Confirmation from Jacopo Migliorelli";
$MessageToCustomer = "Thank You! ".$NameFrom." <br> I received your message! <br> I' ll contact you as soon as possible <br><br> Kind Regards <br> Jacopo Migliorelli";
if(mail($EmailFrom, $subjectToCustomer, $MessageToCustomer, $headersCustomer)){
    echo "The email to customer was successfully sent";
} 
?>