<?php

include("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=3">
    <meta http-equiv="refresh" content="5">
    <title>ESP Security Dashboard</title>
</head>
<body>
   <h1>ESP Security Dashboard</h1>
  
   

    <h2>Intrusion Events</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Distance</th>
            <th>Image</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php 
        $result = mysqli_query($conn, "SELECT * FROM intrusion_events ORDER BY id DESC");

        while($row=mysqli_fetch_assoc($result)){
        ?>
        
       <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['distance_detected']; ?></td>
            <td><img src="uploads/<?php echo $row['image_path'];?>" ></td>
            <td><?php echo $row['event_status']; ?></td>
            <td><?php echo $row['time_stamp']; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>


</html>

