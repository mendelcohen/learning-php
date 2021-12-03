<?php

require 'emailAddress.php';
require 'emailAccountPw.php';
require 'functions.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$sendTo = $emailA;
//Load Composer's autoloader
require 'vendor/autoload.php';
if (isset($_POST['email'])) {
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

    $mail->Username   = $emailA; 

    // $mail->Password   = '';                               //SMTP password

    $mail->Password   = $accountPw; 

    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption

    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption

    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->Port       = 587; 

    //Recipients
    $mail->setFrom($emailA, 'MC');
    $mail->addAddress($sendTo, 'MC');     //Add a recipient
    // $mail->addAddress();               //Name is optional
    $mail->addReplyTo($emailA, 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'EFreeDocs';
    $mail->Body    = 'Welcome to EFreeDocs the site that prints out legal forms for FREE. Check out www.EFreeDocs.com <br> At EFreeDocs we believe everyone should have access to free customizable legal documents. <br> Come check out our site today!<br> © Copyrighted 2021 EFreeDocs tm';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $sent = 'An email confirmation has been sent';
   
    // $sendTo = filter_var($sendTo, FILTER_SANITIZE_EMAIL);
    
    // if (filter_var($sendTo, FILTER_VALIDATE_EMAIL)) {
    //   echo $sendTo;
    //   $mail->send();
    //   echo("$sendTo is a valid email address");
    //   $sent = 'An email confirmation has been sent';
    // } else {
    //   $notSent = "Email address is not valid";
    // }
    
    
    
    
    
    // $vard = var_dump($mail);
    // echo $vard;
    
  } catch (Exception $e) {
    $notSent = "Email could not be validated."; 
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
unset($person['age']);

$todo = [
  'title' => 'Meet with manager',
  'due' => '1:00 pm',
  'assigned_to' => 'employee',
  'completed' => false
];

// $to = "";
// $subject = "";
// $message = "%0D%0AWelcome to  the site that prints out legal forms for FREE. Check out www..com %0D%0AAt  we believe everyone should have access to free customizable legal documents. %0D%0ACome check out our site today!%0D%0A%0D%0A© Copyrighted 2021  tm%0D%0A%0D%0A%0D%0A%0D%0A";
// $additional_headers = 'From: ';
// string $additional_params = ""
// mail($to, $subject, $message, $additional_headers);

// $heading = "Send Email Here";

// $email = htmlspecialChars($_GET['email']);



// dd($person);
if (isset($_POST['age'])) {
  if ($_POST['age'] === "") {
    $permission = "Enter a valid age";
  } else {
    $permission = checkLegalAge($_POST['age']);
  }
  
}
// echo checkLegalAge(15);
// echo checkLegalAge(21);
// echo checkLegalAge(28);

class Task {
public $description;

public $completed = false;

  public function __construct ($description)
  {
    $this->description = $description;
  }

  public function complete()
  {
    $this->$completed = true;
  }

  public function isComplete()
  {
    return $this->$completed;
  }
}

$task = new Task('Go to the store');

// $task->complete();

// var_dump($task->isComplete());

$tasks = [
  new Task("Learn Chitas"),
  new Task("Learn Rambam"),
  new Task("Learn Chassidus")
];
$tasks[0]->complete();
// dd($tasks);

require 'index.view.php';