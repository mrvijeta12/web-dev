<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    require '../phpmailer/Exception.php';
    require '../phpmailer/PHPMailer.php';
    require '../phpmailer/SMTP.php';



    $mail = new PHPMailer(true);

    try {
        //Server settings
        //Enable verbose debug output
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vijetavarma1@gmail.com';
        $mail->Password   = 'tmhuyngbdaxllsxo';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        //Recipients
        $mail->setFrom('vijetavarma1@gmail.com', 'Sender');
        $mail->addAddress('aaravmahima4@gmail.com', 'Receiver');
        // $mail->addAddress('vijetavarma1@gmail.com', 'vijeta varma');





        //Content
        $mail->isHTML(true);
        $mail->Subject = 'TekAlgo Contact Form Data';
        $mail->Body    = "Name:- $name <br/> Email:- $email <br/> Subject: $message <br/>";


        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
