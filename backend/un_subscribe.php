<?php
include "./db_connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once (__DIR__.'./PHPMailer-8.1/src/Exception.php');
require_once (__DIR__.'./PHPMailer-8.1/src/PHPMailer.php');
require_once (__DIR__.'./PHPMailer-8.1/src/SMTP.php');
session_start();

$email = $_POST['email'];
$svrkey = $_POST['svrkey'];
$verify_subscription = mysqli_query($connection, "SELECT * from customer_studies where email = '$email' and svrkey = '$svrkey'");


if (mysqli_num_rows($verify_subscription) == 0) {
    $sql = " INSERT INTO `customer_studies`(`email`, `svrkey`) 
    VALUES ('$email',$svrkey) ";
    //print_r($sql);die;
    mysqli_query($connection, $sql);

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
        $mail->Password='the pass ';                  // SMTP password
        //Recipients
        $mail->setFrom('BRI@gmail.com', 'BRI staff');
        $mail->addAddress($email);     // Add an email address to contact
        //  $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo("BRI@gmail.com");
        //$mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
       // $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'BRI study subscription';
        $mail->Body    = "Greetings:  \r\n
        We gladly inform about your subscription to the study ".$_POST['title'].". It Starts in ".$_POST['DtoS']." days. Hence your have an appointment within 5 days before the start date, wich is ".$_POST['Sdate']."\r\n
        Thanks for the trust and have nice day";
        // $mail->AltBody = $_POST['message'];

        $mail->send();
        //header("location: ../index.php");

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    header("location: ../index.php#studies");
} else {
    $sql=" DELETE FROM `customer_studies` WHERE email = '$email' and svrkey = '$svrkey' ";
    //print_r($sql);die;
    mysqli_query($connection, $sql);
    header("location: ../index.php#studies");
}
