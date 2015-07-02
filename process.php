<?php
// process.php

$errors = array();  // array to hold validation errors
$data = array();        // array to pass back data

// validate the variables ========
if (empty($_POST['name']))
  $errors['name'] = 'Name is required.';

if (empty($_POST['email']))
  $errors['email'] = 'A valid email is required.';

if (empty($_POST['body']))
  $errors['body'] = 'Please enter a brief message.';

// return a response ==============

// response if there are errors
if ( ! empty($errors)) {

  // if there are items in our errors array, return those errors
  $data['success'] = false;
  $data['errors']  = $errors;
} else {

  // if there are no errors, return a message
  $data['success'] = true;
  $data['message'] = 'Success!';
  $email_to = "contact@danielgading.com";
  $email_subject = "Contact Form Message";
  $name = $_POST['name']; // required
  $email_from = $_POST['email']; // required
  $message = $_POST['body']; // required
  $email_message = "Form details below.nn";
  $email_message .= "Name: ".$name."n";
  $email_message .= "Email: ".$email_from."n";
  $email_message .= "Message: ".$message."n";
  $headers = 'From: '.$email_from."rn".
  'Reply-To: '.$email_from."rn" .
  'X-Mailer: PHP/' . phpversion();
  @mail($email_to, $email_subject, $email_message, $headers);
}

// return all our data to an AJAX call
echo json_encode($data);

