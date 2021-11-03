<?php

$address = "localhost";
$user ="root" ;
$pass= "";
$db="bri";
//$connection = mysqli_connect("localhost","root" ,"","bri");
$connection = mysqli_connect($address,$user,$pass,$db);

/*if($connection)
echo 'connection established';
else
echo 'connection failed';*/

?>