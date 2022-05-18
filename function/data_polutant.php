<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","enoseypt_admin","polim3rg4s","enoseypt_polutant");

$sqlQuery = "SELECT * FROM (SELECT id, GAS1, GAS2, GAS3, GAS4, GAS5, reading_time FROM sensordata ORDER BY id DESC LIMIT 500)Var1 ORDER BY id ASC;";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>