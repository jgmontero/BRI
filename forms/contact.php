<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once (__DIR__.'./PHPMailer-8.1/src/Exception.php');
require_once (__DIR__.'./PHPMailer-8.1/src/PHPMailer.php');
require_once (__DIR__.'./PHPMailer-8.1/src/SMTP.php');

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Mailer = "smtp";
    $mail->Host = "smtp.gmail.com";                      // Specify main and backup SMTP servers
    $mail->SMTPAuth   = TRUE;                              // Enable SMTP authentication
    $mail->SMTPDebug  = 0;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;                                // TCP port to connect to
    $mail->Username='your contact address';                 // SMTP username
    $mail->Password='the pass ';                      // SMTP password
    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('your contact address');     // Add an email address to contact
  //  $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];
   // $mail->AltBody = $_POST['message'];

    $mail->send();
    header("location: ../index.php");

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>
