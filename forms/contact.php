<?php
//use your email
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require './assets/vendor/SMTPmailer/Exception.php';
require './assets/vendor/SMTPmailer/PHPMailer.php';
require './assets/vendor/SMTPmailer/SMTP.php';

$mail = new PHPMailer;
$receiving_email_address = 'jgmontero1995@gmail.com';


$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth=TRUE;
$mail->Username='jgmontero1995@gmail.com';
$mail->Password='L0N3C0Y0T3gmail';
$mail->SMTPSecure='tls';
$mail->Port='507';
$mail->setFrom('jgmontero1995@gmail.com','Javier Gómez');

$mail->addAddress($receiving_email_address);
$mail->Subject=$_POST['subject'];
$mail->Body=$_POST['message'];

if(!$mail->send()){

    echo 'Unsended mail';
    echo 'Mailer error'. $mail->ErrorInfo;
}else{
    echo 'Succeed';
}


?>
