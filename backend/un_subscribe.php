<?php
include "./db_connection.php";
session_start();

$email = $_POST['email'];
$svrkey = $_POST['svrkey'];
$verify_subscription = mysqli_query($connection, "SELECT * from customer_studies where email = '$email' and svrkey = '$svrkey'");


if (mysqli_num_rows($verify_subscription) == 0) {
    $sql = " INSERT INTO `customer_studies`(`email`, `svrkey`) 
    VALUES ('$email',$svrkey) ";
    //print_r($sql);die;
    mysqli_query($connection, $sql);
    header("location: ../index.php");
} else {
    $sql=" DELETE FROM `customer_studies` WHERE email = '$email' and svrkey = '$svrkey' ";
    //print_r($sql);die;
    mysqli_query($connection, $sql);
    header("location: ../index.php");
}
