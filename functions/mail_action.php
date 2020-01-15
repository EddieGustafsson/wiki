<?php
namespace wiki;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../includes/PHPMailer-master/src/PHPMailer.php';
require '../includes/PHPMailer-master/src/SMTP.php';
require '../includes/PHPMailer-master/src/Exception.php';

    if(isset($_GET['firstname']) && isset($_GET['lastname']) && isset($_GET['mail']) && isset($_GET['reason']) && isset($_GET['message'])){
        $name = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $input_mail = $_GET['mail'];
        $reason = $_GET['reason'];
        $message = $_GET['message'];
    }

    

    $mail = new PHPMailer;

    //$mail->IsSMTP();
    $mail->CharSet = 'UTF-8';

    /*$mail->Host       = "smtp.gmail.com"; // SMTP server example
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
    $mail->Username   = "wikingdom.info@gmail.com"; // SMTP account username example
    $mail->Password   = "VFy0rwgz";        // SMTP account password example*/

    $mail->From = 'wikingdom.info@gmail.com';
    $mail->FromName = 'Bob Röss';
    $mail->addAddress('wikingdom.info@gmail.com');     // Add a recipient
    $mail->addReplyTo($input_mail, 'KYS');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $reason;
    $mail->Body    = $message;
    $mail->AltBody = 'From: ' . $input_mail;

    //var_dump($mail);

    if(!$mail->send()) {
        echo 'Message could not be sent. ';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }











?>