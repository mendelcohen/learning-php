<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = "";
$username = ""; 

//Load Composer's autoloader
require 'vendor/autoload.php';
if (isset($_GET['name'])) {
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = "ssl://smtp.gmail.com";                    //Set the SMTP server to send through
    $mail->Host       = "smtp.office365.com";                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // $mail->Username   = 'email address';                     //SMTP username

    $mail->Username   = $username; 

    // $mail->Password   = '';                               //SMTP password

    $mail->Password   = ''; 

    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption

    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->Port       = 587; 

    //Recipients
    $mail->setFrom('', 'MC');
    $mail->addAddress($email, 'MC');     //Add a recipient
    // $mail->addAddress();               //Name is optional
    $mail->addReplyTo('', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    if ($mail->send()) {
      $sent = 'Message has been sent';
    }
   
    
  } catch (Exception $e) {
    $notSent = "Message could not be sent."; 
    $error =  "Mailer Error:" . $mail->ErrorInfo;
   
  }
}


$animals = [
  "bulls",
  "cows",
  "goats",
  "lambs",
  "rams"
];


$person = [
  'name' => 'Mendy Cohen',
  'age' => 39,
  'career' => 'web developer'
];

$person['residence'] = 'Springfield, MA';


$to = "";
$subject = "";
$message = "%0D%0AWelcome to  the site that prints out legal forms for FREE. Check out www..com %0D%0AAt  we believe everyone should have access to free customizable legal documents. %0D%0ACome check out our site today!%0D%0A%0D%0A© Copyrighted 2021  tm%0D%0A%0D%0A%0D%0A%0D%0A";
$additional_headers = 'From: ';
// string $additional_params = ""
mail($to, $subject, $message, $additional_headers);

// $heading = "Send Email Here";

$email = htmlspecialChars($_GET['email']);


require 'index.view.php';