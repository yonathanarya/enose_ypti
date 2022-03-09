
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>eNose Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php
        require($_SERVER['DOCUMENT_ROOT'].'/function/sidebar.php');
    ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Menunjukkan status untuk detektor gas polimer</li>
                        </ol>
                        <div class="row">
                            <?php
                                require($_SERVER['DOCUMENT_ROOT'].'/function/warning.php');
                            ?>
                        </div>
                        <div></div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Grafik Pembacaan Sensor
                            </div>
                            <div class="card-body">
                                <div id="chart-container">
                                    <canvas id="graphCanvas"></canvas>
                                </div></div>
                                <div class="card-footer small text-muted"><?php
                                require($_SERVER['DOCUMENT_ROOT'].'/function/update.php');
                                ?>
                                </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Perekaman Data Sensor
                            </div>
                            <div class="card-body">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/function/table.php');
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                <?php
                    require($_SERVER['DOCUMENT_ROOT'].'/function/footer.php');
                ?>   
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <?php
            require($_SERVER['DOCUMENT_ROOT'].'/function/chart.php');
        ?> 
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script>
            window.addEventListener('DOMContentLoaded', event => {
                const datatablesSimple = document.getElementById('datatablesSimple');
                if (datatablesSimple) {
                    new simpleDatatables.DataTable(datatablesSimple);
                }
            });
        </script>
    </body>
</html>
