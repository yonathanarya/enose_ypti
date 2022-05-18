<?php
    $servername = "localhost";
    $dbname = "enoseypt_polutant";
    $username = "enoseypt_admin";
    $password = "polim3rg4s";
    
    $con = mysqli_connect($servername, $username, $password, $dbname);    
    $query = "SELECT id, reading_time FROM sensordata ORDER BY id DESC LIMIT 1";
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            echo 'Terakhir diperbarui pada '. $row["reading_time"] . '';
        }
    }
    mysqli_close($con);
?>