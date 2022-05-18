<?php
    echo '<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="index.php">e-Nose Dashboard</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu Utama</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Detektor Polimer</div>
                    <a class="nav-link" href="charts.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Grafik
                    </a>
                    <a class="nav-link" href="tables.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tabel
                    </a>
                    <div class="sb-sidenav-menu-heading">Gas Polutan</div>
                    <a class="nav-link" href="charts_polutant.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Grafik
                    </a>
                    <a class="nav-link" href="tables_polutant.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tabel
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small"></div>
                
            </div>
        </nav>
    </div>';
?>