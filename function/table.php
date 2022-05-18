<?php
    $servername = "localhost";

    $dbname = "enoseypt_mesin1";
    $username = "enoseypt_admin";
    $password = "polim3rg4s";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT id, location, mq3, mq7, mq9, mg811, tgs2600, reading_time, polymer FROM sensordata ORDER BY id DESC LIMIT 1000";

    echo '<table id="datatablesSimple">
        <thead>
            <tr> 
                <th>ID</th> 
                <th>Lokasi</th>
                <th>MQ-3</th>
                <th>MQ-9</th>
                <th>MQ-135</th>
                <th>MQ-7</th>  
                <th>Waktu Perekaman</th>
                <th>Label</th> 
            </tr>
        </thead>
        <tfoot>
            <tr> 
                <th>ID</th> 
                <th>Lokasi</th>
                <th>MQ-3</th>
                <th>MQ-9</th>
                <th>MQ-135</th>
                <th>MQ-7</th>  
                <th>Waktu Perekaman</th>
                <th>Label</th>  
            </tr>
        </tfoot>';
    echo '<tbody>';
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["id"];
            $row_location = $row["location"];

            $row_mq7 = $row["mq7"]; 
            $row_mq9 = $row["mq9"];
            $row_mg811 = $row["mg811"]; 
            $row_tgs2600 = $row["tgs2600"]; 
            $row_reading_time = $row["reading_time"];
            $row_polymer = $row["polymer"];
            echo '<tr> 
                    <td>' . $row_id . '</td>
                    <td>' . $row_location . '</td> 

                    <td>' . $row_mq7 . '</td>
                    <td>' . $row_mq9 . '</td> 
                    <td>' . $row_mg811 . '</td>
                    <td>' . $row_tgs2600 . '</td> 
                    <td>' . $row_reading_time . '</td> 
                    <td>' . $row_polymer . '</td> 
                    </tr>';
        }
        $result->free();
    }
    echo'</tbody>
    </table>';
    $conn->close();
?>