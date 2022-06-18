<?php
    $servername = "localhost";

    $dbname = "enoseypt_polutant";
    $username = "enoseypt_admin";
    $password = "polim3rg4s";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT id, GAS1, GAS2, GAS3, reading_time FROM sensordata ORDER BY id DESC LIMIT 1000";

    echo '<table id="datatablesSimple">
        <thead>
            <tr> 
                <th>No.</th>
                <th>CO</th>
                <th>NH3</th>
                <th>NO</th>
                <th>Waktu Perekaman</th>
            </tr>
        </thead>
        <tfoot>
            <tr> 
                <th>No.</th>
                <th>CO</th>
                <th>NH3</th>
                <th>NO</th>
                <th>Waktu Perekaman</th>
            </tr>
        </tfoot>';
    echo '<tbody>';
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["id"];
            $row_GAS1 = $row["GAS1"]; 
            $row_GAS2 = $row["GAS2"];
            $row_GAS3 = $row["GAS3"];
            $row_reading_time = $row["reading_time"];
            echo '<tr> 
                    <td>' . $row_id . '</td>
                    <td>' . $row_GAS1 . '</td>
                    <td>' . $row_GAS2 . '</td> 
                    <td>' . $row_GAS3 . '</td>
                    <td>' . $row_reading_time . '</td>
                    </tr>';
        }
        $result->free();
    }
    echo'</tbody>
    </table>';
    $conn->close();
?>