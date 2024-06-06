<?php
 include '../config/database.php';
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
                                    <h4>Tambah Data Alternatif</h4>
                                    <br>
                                    <form action="tambah_alternatif.php" method="post">
                                        <div class="form-group">
                                            <label for="inputnama">Nama</label>
                                            <input type="text" class="form-control" id="inputnama" name="inputnama"
                                                placeholder="Nama Alternatif" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jeniskelamin">Jenis Kelamin</label>
                                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                                    </form>
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
<?php 
    include '../config/database.php';

    if(isset($_POST['submit'])){
        $nama_alt = mysqli_real_escape_string($conn, $_POST['inputnama']);
        $jenis_kel = $_POST['jeniskelamin'];
        // $harga_barang = mysqli_real_escape_string($conn, $_POST['harga_barang']); // Uncomment and use if needed

        $insertData = "INSERT INTO alternatif (`id_alternatif`, `nama_alternatif`, `jenis_kelamin`) VALUES (NULL, '$nama_alt', '$jenis_kel')";
        $insertResult = mysqli_query($conn, $insertData);

        if($insertResult){
            echo "<script>alert('Berhasil menambah data alternatif.')</script>";
            echo "<script>window.location.href = 'alternatif.php';</script>";
            // Alternatively, you can use: echo "<script>location.reload();</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>