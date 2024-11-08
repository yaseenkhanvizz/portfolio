<?php

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 

// Include PHPMailer library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php';

// Email configuration
$receiving_email_address = 'yaseenahm324@gmail.com';

if (isset($_POST['email'])) {
    $from_name = $_POST['name'];
    $from_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0; // Set to 1 or 2 for debugging
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = 'rosekhn0340@gmail.com';
    $mail->Password = 'agcbgbcznjakzczs';

    $mail->setFrom($from_email, $from_name);
    $mail->addReplyTo($from_email);
    $mail->addAddress($receiving_email_address);
    $mail->isHTML(true);
    $mail->Subject = "Contact Us Message (Portfolio): " . $subject;
    $mail->Body = "
        <html>
            <head><title>$subject</title></head>
            <body>
                <h2>Message from $from_name</h2>
                <p><strong>Email:</strong> $from_email</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            </body>
        </html>
    ";

    // Send the email and handle response
    if (!$mail->send()) {
        echo 'Error: ' . $mail->ErrorInfo;
    } else {
        echo 'OK'; // Return "OK" if successful for JavaScript handling
    }
}

exit;
?>
