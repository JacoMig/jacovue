<?php
$nachricht = "Zeile 1\r\nZeile 2\r\nZeile 3";

$Betreff = $_POST['name'];

$nachricht = wordwrap($nachricht, 70, "\r\n");

// Verschicken
$obj = new stdObject();

if(mail('jacomig@gmail.com', $Betreff, $nachricht)){
    $obj->name = "Success";
    echo $obj;
}
?>