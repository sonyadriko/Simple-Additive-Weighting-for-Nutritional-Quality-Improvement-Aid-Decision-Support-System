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
                                <h4>Data Kriteria</h4>
                                    <!-- <a href="tambah_kriteria.php" class="btn btn-primary btn-user">Tambah Kriteria</a> -->
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kriteria</th>
                                                    <th scope="col">Bobot</th>
                                                    <th scope="col">Tipe</th>
                                                    <th scope="col">Action</th>
                                                    <!-- <th scope="col">Handle</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                $no = 1;
                $get_data = mysqli_query($conn, "select * from kriteria");
                while($display = mysqli_fetch_array($get_data)) {
                    $id = $display['id_kriteria'];
                    $nama = $display['nama_kriteria'];
                    $bobot = $display['bobot_kriteria'];
                    $tipe = $display['tipe_kriteria'];

                
                ?>
                <td class="text-truncate"><?php echo $no ?></td>
                <td class="text-truncate">
                    <a href='sub_kriteria.php?GetID=<?php echo $id?>'><?php echo $nama ?></a>
                </td>
                <td class="text-truncate"><?php echo $bobot ?></td>
                <td class="text-truncate"><?php echo $tipe ?></td>
                <td class="text-truncate">
                    <a href='ubah_barang.php?GetID=<?php echo $id ?>' style="text-decoration: none; list-style: none;"><input type='submit' value='Ubah' id='editbtn' class="btn btn-primary btn-user" ></a>
                    <a href='delete_barang.php?Del=<?php echo $id ?>' style="text-decoration: none; list-style: none;"><input type='submit' value='Hapus' id='delbtn' class="btn btn-primary btn-user" ></a>                       
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