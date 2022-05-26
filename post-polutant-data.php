<?php
$servername = "localhost";
$dbname = "enoseypt_polutant";
$username = "enoseypt_admin";
$password = "polim3rg4s";

$api_key_value = "h8ehY7a3Ms21";

$api_key = $GAS1 = $GAS2 = $GAS3 = $GAS4 = $GAS5 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $GAS1 = test_input($_POST["GAS1"]);
        $GAS2 = test_input($_POST["GAS2"]);
        $GAS3 = test_input($_POST["GAS3"]);
        $GAS4 = test_input($_POST["GAS4"]);
        $GAS5 = test_input($_POST["GAS5"]);

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO sensordata (GAS1, GAS2, GAS3, GAS4, GAS5)
        VALUES ('" . $GAS1 . "', '" . $GAS2 . "', '" . $GAS3 . "', '" . $GAS4 . "', '" . $GAS5 . "')";
        
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