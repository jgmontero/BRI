<?php

include "./db_connection.php";
$email = $_POST['email'];
$pass = $_POST["pass"];

//searching for the existence of the given email
$email_check_query = "SELECT * from customers where email = '$email'";
$check_unique_email = mysqli_query($connection, $email_check_query);
$pass_hash = mysqli_fetch_assoc($check_unique_email);
$pass = hash('md5', $pass);
$pass = hash('sha1', $pass . $email);
$pass_hash['password'];
$verify_login = mysqli_query($connection, "SELECT * from customers where email = '$email' and password = '$pass'");
if (mysqli_num_rows($verify_login) > 0) {
    $_SESSION['invalidLogin']=false;
    echo json_encode('true');
} else {
    $_SESSION['invalidLogin']=true;
    echo json_encode('false');
}