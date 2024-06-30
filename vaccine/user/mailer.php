<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    echo "<div style='display:none'>'";
	$mail->SMTPDebug = 2;									 
	$mail->isSMTP();										 
	$mail->Host	 = 'smtp.gmail.com;';				 
	$mail->SMTPAuth = true;							 
	$mail->Username = 'md002asif@gmail.com';				 
	$mail->Password = 'rkzwabbwwjimpfbd';					 
	$mail->SMTPSecure = 'tls';							 
	$mail->Port	 = 587; 

	$mail->setFrom('phpteam2.fabhost@gmail.com', 'Admin');		 
	$mail->addAddress($email);
	
	
	$mail->isHTML(true);								 
	$mail->Subject = 'Vaccination Details';
	$mail->Body = $vaccine.' Vaccination taken on '.$vdate;
	$mail->send();
    echo "</div>";
	echo '<script>alert("Vaccination Taken Successfully");window.location.replace("next.php");</script>';
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


