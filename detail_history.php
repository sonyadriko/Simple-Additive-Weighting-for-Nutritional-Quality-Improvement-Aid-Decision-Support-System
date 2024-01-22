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
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                <h4>Data Detail History</h4>

                                    <!-- <a href="tambah_kriteria.php" class="btn btn-primary btn-user">Tambah Kriteria</a> -->
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Alternatif</th>
                                                    <th scope="col">Hasil Akhir</th>
                                                    <th scope="col">Ranking</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                $no = 1;
                $id_hasil = $_GET['GetID'];
                $get_data = mysqli_query($conn, "select * from detail_hasil where id_hasil = '".$id_hasil."'");
                while($display = mysqli_fetch_array($get_data)) {
                    $id = $display['id_detail_hasil'];
                    $id_hasil = $display['id_hasil'];
                    $hasil_alternatif = $display['nama_alternatif'];
                    $hasil_akhir = $display['hasil_akhir'];
                    $ranking = $display['ranking'];
              

                
                ?>
                <td class="text-truncate"><?php echo $no ?></td>
                <td class="text-truncate"><?php echo $hasil_alternatif ?></td>
                <td class="text-truncate"><?php echo $hasil_akhir ?></td>
                <td class="text-truncate"><?php echo $ranking ?></td>
            
              </tr>
              <?php
              $no++;
                }
              ?>
                                            </tbody>
                                        </table>
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