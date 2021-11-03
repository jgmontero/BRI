<?php
include "./db_connection.php";

$email = $_POST['email'];
$pass  = $_POST["pass"];
$pass_confirm = $_POST["pass_confirm"];
$first_name = $_POST["first_name"];
$last_name  = $_POST["last_name"];
$female = $_POST["female"];
$date_of_birth   = $_POST["date_of_birth"];
$weight   = $_POST["weight"];
$height   = $_POST["height"];
$address   = $_POST["address"];
$city    = $_POST["city"];
$state = $_POST["state"];
$zip_code = $_POST["zip_code"];
$country    = $_POST["country"];
$phone   = $_POST["phone"];
$language   = $_POST["language"];
$communication  = $_POST["communication"];
$contact_time   = $_POST["contact_time"];


// server-side validations
//email
$email_user=explode('@',$email);
if(count($email_user)!=2){
      echo '<script>
      alert("Invalid email format");
      window.location = "../pages/login-registrer.php"
      </script>';
}
if( count(explode('.',$email_user[1]))!=2){
      echo '<script>
      alert("Invalid email format.");
      window.location = "../pages/login-registrer.php"
      </script>';
 
}
$email_check_query = "select * from customers where email = '$email'";
$check_unique_email = mysqli_query($connection, $email_check_query);
if (mysqli_num_rows($check_unique_email) > 0) {
      echo '<script>
      alert("email address already used");
      window.location = "../login-registrer.php"
      </script>';
}
//pass
if ($pass != $pass_confirm) {
      echo '<script>
      alert("password and password confirmation fields should match");
      window.location = "../login-registrer.php"
      </script>';
}
// pass encrypt md5 sha512 
$pass = hash('md5',$pass);
$pass = hash('sha1',$pass.$email);

$QUERY = " INSERT INTO customers
       (`email`, `password`, `first_name`, `last_name`, `date_of_birth`, `female`, `weight`, `height`, `address`, `city`,
       `state`, `zip_code`, `country`, `phone`, `language`, `communication`, `contact_time`)
       VALUES ('$email','$pass','$first_name','$last_name','$date_of_birth',$female,$weight,'$height','$address','$city','$state',
      '$zip_code','$country','$phone','$language', '$communication','$contact_time')";

$execute = mysqli_query($connection, $QUERY);
if ($execute) {
      echo '<script>
      alert("Your user was inserted");
      window.location = "../index.php"
      </script>';
} else {
      echo "<script>
      alert('something bad happens ')
      window.location = '../index.php'
      </script>";
}
mysqli_close($connection);
