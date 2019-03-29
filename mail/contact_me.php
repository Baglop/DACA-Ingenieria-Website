<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$utf8_message = utf8_decode($message);
$utf8_name = utf8_decode($name);
   
// Create the email and send the message
$to = 'contacto@dacaingenieria.com.mx'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Email enviado desde pagina web por:  $utf8_name";
$email_body = "<html><body>";
$email_body .= "<h2>Correo recibido desde el formulario de contacto</h2>";
$email_body .= "<p><strong>Nombre:</strong> $utf8_name </p>";
$email_body .= "<p><strong>Email:</strong> $email_address </p>";
$email_body .= "<hr>";
$email_body .= "<strong>Mensaje:</strong><br>";
$email_body .= "<pre style=\"font-family: Arial\">$utf8_message</pre>";
$email_body .= "</body></html>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: no-reply@dacaingenieria.com.mx" . "\r\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.


if(mail($to,$email_subject,$email_body,$headers))return true; else return false;
?>
