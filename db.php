<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "security_db";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    echo"Connection Failed!";
}

?>