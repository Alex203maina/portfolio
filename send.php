<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    try {
        // SMTP server configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alex203maina@gmail.com'; 
        $mail->Password = 'tyjg oxgl hkzt eath';  
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Email settings
        $mail->setFrom('alex203maina@gmail.com', 'Alex');
        $mail->addAddress($_POST["email"], $_POST["name"]);

        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = "<p><strong>Name:</strong> {$_POST["name"]}</p>
                       <p><strong>Message:</strong><br>{$_POST["message"]}</p>";

        // Send the email
        $mail->send();

        // Redirect after successful submission
        echo "
        <script>
            alert('Sent successfully');
            window.location.href = 'index.php';
        </script>
        ";

    } catch (Exception $e) {
        echo "
        <script>
            alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
        </script>
        ";
    }
}
