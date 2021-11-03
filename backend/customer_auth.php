<?php
session_start();
include "./db_connection.php";

$email = $_GET['email'];
$email_user = explode('@', $email);
if (count($email_user) != 2) {
  echo '<script>
      alert("Invalid email format");
      window.location = "../pages/login-registrer.php"
      </script>';
}
if (count(explode('.', $email_user[1])) != 2) {
  echo '<script>
      alert("Invalid email format.");
      window.location = "../pages/login-registrer.php"
      </script>';
}
//searching for the existence of the given email
$email_check_query = "SELECT * from customers where email = '$email'";
$check_unique_email = mysqli_query($connection, $email_check_query);
$pass_hash = mysqli_fetch_assoc($check_unique_email);


$pass  = $_GET["pass"];
$pass = hash('md5', $pass);
$pass = hash('sha1', $pass . $email);
$pass_hash['password'];

// Print the result depending if they match
$verify_login = mysqli_query($connection, "SELECT * from customers where email = '$email' and password = '$pass'");


if (mysqli_num_rows($verify_login) > 0) {
  $_SESSION['user']= $email;
  header("location: ../index.php");
  exit;
} else {
  echo '<script>
      alert("Wrong user or password");
      window.location = "../pages/login-registrer.php"
      </script>';
}
