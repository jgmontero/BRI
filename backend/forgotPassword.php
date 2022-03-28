<?php

include "./db_connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once (__DIR__.'./PHPMailer-8.1/src/Exception.php');
require_once (__DIR__.'./PHPMailer-8.1/src/PHPMailer.php');
require_once (__DIR__.'./PHPMailer-8.1/src/SMTP.php');

session_start();
$email = $_POST['email'];
$email_user = explode('@', $email);
if (count($email_user) != 2) {
    header("location: ../pages/forgotPasswordPage.php");

}
if (count(explode('.', $email_user[1])) != 2) {
    header("location: ../pages/forgotPasswordPage.php");
}
//searching for the existence of the given email
$email_check_query = "SELECT * from customers where email = '$email'";
$check_unique_email = mysqli_query($connection, $email_check_query);


//print_r($check_unique_email->num_rows);die;

if ($check_unique_email->num_rows == 1) {
    $_SESSION['invalidLogin']=false;


    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }

    $password  = $randstring;
    $pass = hash('md5', $password);
    $pass = hash('sha1', $pass . $email);
    //$pass_hash['password'];

    $update = "UPDATE `customers` SET `password` = '{$pass}'";
    $update_password_recovery = mysqli_query($connection, $update);

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
        $mail->Subject = 'Password recovery';
        $mail->Body    = "Greetings:  \r\n
        We receive the request of password recovery for your account, your new password is ".$password;
        // $mail->AltBody = $_POST['message'];

        $mail->send();
        header("location: ../index.php");

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    header("location: ../index.php");
    exit;
} else {
    //print_r("Wrong credentials");
    $_SESSION['invalidLoginRecover']=true;
    header("location: ../pages/forgotPasswordPage.php");

}




