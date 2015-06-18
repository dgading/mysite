<?php
$name = $_POST['contact_name'];
$email = $_POST['contact_email'];
$message = $_POST['contact_message'];
$formcontent="From: $name \n Message: $message";
$recipient = "daniel@danielgading.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
 if(isset($_POST['submit']))
    {
    header("Location: http://danielgading.com/success.html");
    }
?>
