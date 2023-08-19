<?php
require 'PHPMailerAutoload.php'; // Include PHPMailer library

function sendOTP($email, $otp)
{
    // Create a new PHPMailer instance
    $mail = new PHPMailer;

    // Set up SMTP (you may need to configure this with your SMTP server settings)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'cse20733076@matrusri.edu.in'; // Your SMTP username
    $mail->Password = 'ygpqovebqhtwpnuo'; // Your SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Set email content
    $mail->setFrom('reddytejaswaroop@gmail.com', 'GPA'); // Sender email and name
    $mail->addAddress($email); // Recipient email
    $mail->isHTML(true);
    $mail->Subject = 'GPA - OTP Verification'; // Email subject
    $mail->Body = 'Your OTP for GPA verification is: ' . $otp; // Email body

    // Send the email
    if ($mail->send()) {
        return true; // Email sent successfully
    } else {
        return false; // Failed to send email
    }
}
?>