<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);


    require './phpmailer/Exception.php';
    require './phpmailer/PHPMailer.php';
    require './phpmailer/SMTP.php';



    $mail = new PHPMailer(true);

    try {
        //Server settings
        //Enable verbose debug output
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vijetavarma1@gmail.com';
        $mail->Password   = 'hjfefiyowdiqndul';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        //Recipients
        $mail->setFrom('vijetavarma1@gmail.com', 'Vijeta Varma');
        $mail->addAddress('aaravmahima4@gmail.com', 'Aarav Mahima');
        // $mail->addAddress('vijetavarma1@gmail.com', 'vijeta varma');





        //Content
        $mail->isHTML(true);
        $mail->Subject = 'TekAlgo Contact Form Data';
        $mail->Body    = "Name:- $name <br/> Email:- $email <br/> Subject: $message <br/>";


        $mail->send();
        echo "<script>
        sessionStorage.setItem('popupClosed', 'true');
      
        window.location.href = window.location.href; // Reload the page
      </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
