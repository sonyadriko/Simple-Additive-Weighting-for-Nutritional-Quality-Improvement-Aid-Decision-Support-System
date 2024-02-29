<?php
 include 'koneksi.php';
 session_start();
  if (!isset($_SESSION['id_admin'])) {
      header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SAW</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/logo/favicon.png"> -->

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
         <?php include'header.php'?>
            <!-- Header END -->

            <!-- Side Nav START -->
         <?php include'sidenav.php'?>
            
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                <h3>Halo, <?php echo $_SESSION['role']; ?> </h3>
                <h3>Selamat datang di aplikasi sistem pendukung keputusan metode Simple Additive Weighting (SAW)</h3></br>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <!-- <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                            <i class="anticon anticon-line-chart"></i>
                                        </div> -->
                                        <div class="m-l-15">
                                            <h2 class="m-b-0">
                                            <?php // Query to get total items
                                            $sql = "SELECT COUNT(*) AS jumlah FROM kriteria";
                                            $resultBarang = $conn->query($sql); 
                                            $hasilBarang = mysqli_fetch_array($resultBarang);
                                            echo "{$hasilBarang['jumlah']}";?>
                                            </h2>
                                            <p class="m-b-0 text-muted">Kriteria</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <!-- <div class="avatar avatar-icon avatar-lg avatar-gold">
                                            <i class="anticon anticon-profile"></i>
                                        </div> -->
                                        <div class="m-l-15">
                                            <h2 class="m-b-0">
                                            <?php // Query to get total items
                                            $sql = "SELECT COUNT(*) AS jumlah FROM penilaian";
                                            $resultBarang = $conn->query($sql); 
                                            $hasilBarang = mysqli_fetch_array($resultBarang);
                                            echo "{$hasilBarang['jumlah']}";?>
                                            </h2>
                                            <p class="m-b-0 text-muted">Penilaian</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <!-- <div class="avatar avatar-icon avatar-lg avatar-gold">
                                            <i class="anticon anticon-profile"></i>
                                        </div> -->
                                        <div class="m-l-15">
                                            <h2 class="m-b-0">
                                            <?php // Query to get total items
                                            $sql = "SELECT COUNT(*) AS jumlah FROM hasil";
                                            $resultBarang = $conn->query($sql); 
                                            $hasilBarang = mysqli_fetch_array($resultBarang);
                                            echo "{$hasilBarang['jumlah']}";?>
                                            </h2>
                                            <p class="m-b-0 text-muted">History</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content justify-content-between">
                        <p class="m-b-0">Copyright © 2024</p>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

          
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>