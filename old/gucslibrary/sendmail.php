<?php
include 'phpmailer/class.smtp.php';
require_once('phpmailer/class.phpmailer.php');


define('GUSER', 'monjovi8@gmail.com'); // GMail username
define('GPWD', 'hugo10038'); // GMail password

function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465; 
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}

//$name = 'Username';
//$password = 'Password';
//$email ='abc@gmail.com';
//$hash = $_GET['hash'];
$subject = 'Activation Link';
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$myusername.'
Password: '.$mypassword.'
------------------------
 
Please click this link to activate your account:
http://http://localhost/gucslibrary/verify.php?email='.$myemail.'&hash='.$hash.'
 
';

?>