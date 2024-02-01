<?php
 include 'koneksi.php';
 session_start();
  if (!isset($_SESSION['id_admin'])) {
      header("Location: login.php");
  }
  $queryKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
$kriteriaData = mysqli_fetch_all($queryKriteria, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SAW</title>
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
                                    <h4>Tambah Data Sub Kriteria</h4>
                                    <br>
                                    <form action="tambah_sub_kriteria.php" method="post">
                                        <div class="form-group">
                                            <label for="selectKriteria">Kriteria</label>
                                            <select class="form-control" id="selectKriteria" name="selectKriteria">
                                                <?php
                                                foreach ($kriteriaData as $kriteria) {
                                                    echo '<option value="' . $kriteria['id_kriteria'] . '">' . $kriteria['nama_kriteria'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputKategori">Kategori Status Gizi</label>
                                            <input type="text" class="form-control" id="inputKategori" name="inputKategori" placeholder="Input Kategori Status Gizi..." required>       
                                        </div>
                                        <div class="form-group">
                                            <label for="inputBobot">Bobot Kategori</label>
                                            <input type="number" step="0.01" class="form-control" id="inputBobot" name="inputBobot" placeholder="Input Bobot Kategori..." required>       
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="footer-content justify-content-between">
                        <p class="m-b-0">Copyright © 2024</p>
                    </div>
                </footer>
            </div>
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
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $kriteria = $_POST['selectKriteria'];
        $nama_sub = mysqli_real_escape_string($conn, $_POST['inputKategori']);
        $bobot_kat = $_POST['inputBobot'];
        // $harga_barang = mysqli_real_escape_string($conn, $_POST['harga_barang']); // Uncomment and use if needed

        $insertData = "INSERT INTO sub_kriteria (`id_sub_kriteria`, `id_kriteria`, `kategori_status_gizi`, `bobot_kategori`) VALUES (NULL, '$kriteria', '$nama_sub', '$bobot_kat')";
        $insertResult = mysqli_query($conn, $insertData);

        if($insertResult){
            echo "<script>alert('Berhasil menambah data sub kriteria.')</script>";
            echo "<script>window.location.href = 'kriteria.php';</script>";
            // Alternatively, you can use: echo "<script>location.reload();</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>