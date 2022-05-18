<!DOCTYPE html>
    <html>
        <head>
            <style>
                
                td, th {
                padding: 5px;
                text-align:center;
                        
                }
            </style>
        </head>

<?php
    $servername = "localhost";
    $dbname = "enoseypt_polutant";
    $username = "enoseypt_admin";
    $password = "polim3rg4s";
    
    $con = mysqli_connect($servername, $username, $password, $dbname);    
    $query = "SELECT id, GAS1, GAS2, GAS3, GAS4, GAS5, reading_time FROM sensordata ORDER BY id DESC LIMIT 1";
    $query_run = mysqli_query($con,$query);

    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            $row_id = $row["id"];
            $row_GAS1 = $row["GAS1"]; 
            $row_GAS2 = $row["GAS2"];
            $row_GAS3 = $row["GAS3"]; 
            $row_GAS4 = $row["GAS4"];
            $row_GAS5 = $row["GAS5"];
            $row_time = $row["reading_time"];  
            echo '
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Kadar Gas Polutan
                </div>
                <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>GAS 1</th>
                            <th>GAS 2</th>
                            <th>GAS 3</th>
                            <th>GAS 4</th>
                            <th>GAS 5</th>
                            <th>Terakhir Diperbarui</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>' . $row_GAS1 . '</td>
                            <td>' . $row_GAS2 . '</td> 
                            <td>' . $row_GAS3 . '</td>
                            <td>' . $row_GAS4 . '</td>
                            <td>' . $row_GAS5 . '</td>
                            <td>' . $row_time . '</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            ';
        }
    }
?>

</html>