<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","enoseypt_admin","polim3rg4s","enoseypt_mesin1");

$sqlQuery = "SELECT * FROM (SELECT id, mq3, mq7, mq9, mg811, tgs2600, reading_time, polymer FROM sensordata ORDER BY id DESC LIMIT 500)Var1 ORDER BY id ASC;";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>