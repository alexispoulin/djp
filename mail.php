<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Le nom ne peut pas être vide', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'Le champ ne peut pas être vide', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => 'Le champ ne peut pas être vide', 'code' => 0));
exit();
}
}
if ($subject === ''){
print json_encode(array('message' => 'Le champ ne peut pas être vide', 'code' => 0));
exit();
}
if ($message === ''){
print json_encode(array('message' => 'Le champ ne peut pas être vide', 'code' => 0));
exit();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "alexispoulin20@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Nous avons bien reçus votre message!', 'code' => 1));
exit();
?>