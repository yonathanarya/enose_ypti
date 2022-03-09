<?php
$servername = "localhost";
$dbname = "enoseypt_mesin1";
$username = "enoseypt_admin";
$password = "polim3rg4s";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $location = $mq3 = $mq7 = $mq9 = $mg811 = $tgs2600 = "";
$polymer = "-1";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $location = test_input($_POST["location"]);
        $mq3 = test_input($_POST["mq3"]);
        $mq7 = test_input($_POST["mq7"]);
        $mq9 = test_input($_POST["mq9"]);
        $mg811 = test_input($_POST["mg811"]);
        $tgs2600 = test_input($_POST["tgs2600"]);

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO sensordata (location, mq3, mq7, mq9, mg811, tgs2600, polymer)
        VALUES ('" . $location . "', '" . $mq3 . "', '" . $mq7 . "', '" . $mq9 . "', '" . $mg811 . "', '" . $tgs2600 . "', '" . $polymer . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}