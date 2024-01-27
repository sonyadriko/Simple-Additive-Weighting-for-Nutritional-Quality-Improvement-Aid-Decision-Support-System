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
                                <h4>Data Sub Kriteria</h4>

                                    <a href="tambah_sub_kriteria.php" class="btn btn-primary btn-user">Tambah Sub Kriteria</a>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kriteria</th>
                                                    <th scope="col">Sub Kriteria</th>
                                                    <th scope="col">Bobot</th>
                                                    <!-- <th scope="col">Tipe</th> -->
                                                    <th scope="col">Action</th>
                                                    <!-- <th scope="col">Handle</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                $id_data = $_GET['GetID'];
                $no = 1;
                $get_data = mysqli_query($conn, "select * from sub_kriteria join kriteria on sub_kriteria.id_kriteria = kriteria.id_kriteria where sub_kriteria.id_kriteria = $id_data ");
                while($display = mysqli_fetch_array($get_data)) {
                    $id = $display['id_sub_kriteria'];
                    $id_kriteria = $display['nama_kriteria'];
                    $kategori = $display['kategori_status_gizi'];
                    $bobot = $display['bobot_kategori'];
                
                ?>
                <td class="text-truncate"><?php echo $no ?></td>
                <td class="text-truncate"><?php echo $id_kriteria ?></td>
                <td class="text-truncate"><?php echo $kategori ?></td>
                <td class="text-truncate"><?php echo $bobot ?></td>
                <td class="text-truncate">
                    <a href='update_sub_kriteria.php?GetID=<?php echo $id ?>' style="text-decoration: none; list-style: none;"><input type='submit' value='Ubah' id='editbtn' class="btn btn-primary btn-user" ></a>
                    <a href='delete_sub_kriteria.php?Del=<?php echo $id ?>' style="text-decoration: none; list-style: none;"><input type='submit' value='Hapus' id='delbtn' class="btn btn-primary btn-user" ></a>                       
                </td>
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