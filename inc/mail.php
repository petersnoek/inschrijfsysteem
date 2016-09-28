<?php

require_once 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
require_once 'inc/blade.php';			// creates $blade 

function SendActivationEmail($email, $name) {

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "ictambw@gmail.com";
	$mail->Password = "Studentje1";
	
	//Set who the message is to be sent from
	$mail->setFrom('ictambw@gmail.com', 'ICTA MBW');
	
	//Set who the message is to be sent to
	$mail->addAddress($email, $name);
	//Set the subject line
	$mail->Subject = 'Account verification';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body

	$msg = $blade->view()->make('sendmail')->withErrors($errors)->render();

	$mail->msgHTML(file_get_contents('views/sendmail.html'), dirname(__FILE__));
	//Replace the plain text body with one created manually
	$mail->AltBody = 'Your e-mail client does not support HTML emails.';
	
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";
	}

	return true;
}