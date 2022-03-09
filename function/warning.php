<?php
    $servername = "localhost";

    $dbname = "enoseypt_mesin1";
    $username = "enoseypt_admin";
    $password = "polim3rg4s";
    
    $con = mysqli_connect($servername, $username, $password, $dbname);    
    $query = "SELECT id, polymer FROM sensordata ORDER BY id DESC LIMIT 1";
    $query_run = mysqli_query($con,$query);

    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row){
            if($row["polymer"] == 0){
                ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Udara Normal</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#" target="_blank">Tidak ada gas berbahaya</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            elseif($row["polymer"] == 1){
                ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Bahaya</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#" target="_blank">Gas polimer berbahaya terdeteksi</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            elseif($row["polymer"] > 1){
                ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Peringatan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#" target="_blank">Gas polutan terdeteksi</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            elseif($row["polymer"] < 0){
                ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Belum Diproses</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#" target="_blank">Data terkini belum diproses oleh sistem</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
?>