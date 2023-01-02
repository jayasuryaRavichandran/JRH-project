<?php
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'mail/src/Exception.php'; 
require 'mail/src/PHPMailer.php'; 
require 'mail/src/SMTP.php'; 
 
// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer; 
 
// Server settings 
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
$mail->isSMTP();                            // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;                     // Enable SMTP authentication 
$mail->Username = 'joyrisinghobby@gmail.com';       // SMTP username 
$mail->Password = 'pndernqhptwjrbei';         // app password  get gmail
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 465;                          // TCP port to connect to 
 
// Sender info 
$mail->setFrom('joyrisinghobby.com', 'SenderName'); 
//$mail->addReplyTo('reply@example.com', 'SenderName'); 
 
// Add a recipient 
$mail->addAddress('murali@joyrisinghobby.com'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'thank you for subscribed JRH'; 
 
// Mail body content 
$bodyContent = '<h1>contact form message</h1>'; 
$bodyContent = '<h3>Name: '.$_POST['name'].'</h3>'; 
$bodyContent .= '<h3>email: '.$_POST['email'].' </h3>'; 
$bodyContent .= '<h3>number: '.$_POST['num'].' </h3>'; 
$bodyContent .= '<p><b>Message:</b> '.$_POST['enquiry'].' </p>';

$mail->Body    = $bodyContent; 
 
// Send email 
if($mail->send()) { 
    echo 'Message has been sent.'; 
    // echo ' <button onclick="document.location.href=`index.html`"> go back </button>';
    echo "<script> location.href='./index.html'; </script>";
    
} else { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
}



?>