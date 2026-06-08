<?php

include("db.php");

$distance = $_GET['distance'];
$status = $_GET['event_status'];

$sql = "INSERT INTO intrusion_events(distance_detected, event_status) VALUES('$distance', '$status')";

if(mysqli_query($conn,$sql)){
    echo"OK";
}


?>