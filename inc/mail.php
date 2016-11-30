<?php

// use Philo\Blade\Blade;

function SendActivationEmail($email, $name) {

    /* vooraf: je hebt PHP mailer geinstalleerd via composer; PHPmailer staat op je schijf in de map /vendor/phpmailer
     * 
     *
     * 1. maak een gratis account aan op http://www.smtp2go.com/
     * 2. log in op https://app.smtp2go.com/login/
     * 3. voer een SMTP user en password in en vul deze hieronder ook in
     *
     *      $mail->Username = "petersnoek@davinci.nl";    // vervang dit door je eigen SMTP username
     *      $mail->Password = "HwQkR8RyR64b";             // vervang dit door je eigen SMTP password
     * 4. nu kun je mails versturen
     */

    require_once 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = "mail.smtp2go.com";
    $mail->Port = "80"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = "petersnoek@davinci.nl";
    $mail->Password = "HwQkR8RyR64b";

    $mail->From     = "petersnoek@davinci.nl";
    $mail->FromName = "Peter Snoek";
    $mail->AddAddress($email, $name);
    $mail->AddReplyTo("petersnoek@davinci.nl", "Peter Snoek");

    $mail->Subject  = "Hi!";
    $mail->Body     = "Hi! How are you?";
    $mail->WordWrap = 50;

    if(!$mail->Send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
        return false;
    } else {
        echo 'Message has been sent.';
        return true;
    }

    return false;

}

