<?php
 include '../config/database.php';
 session_start();
  if (!isset($_SESSION['id_admin'])) {
      header("Location: login.php");
  }
    $queryAlternatif = mysqli_query($conn, "SELECT * FROM penilaian");
    $alternatifData = mysqli_fetch_all($queryAlternatif, MYSQLI_ASSOC);

    $id_data = $_GET['GetID'];
    $query = mysqli_query($conn, "SELECT * FROM penilaian WHERE id_penilaian = '".$id_data."'");
    while($row = mysqli_fetch_assoc($query)){
        
        $nama = $row['alternatif'];
        $jeniskelamin = $row['jenis_kelamin'];
        $umur = $row['umur'];
        $berat = $row['berat'];
        $tinggi = $row['tinggi'];
        $lila = $row['lila'];
        // $umur = $row['umur'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SAW</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="../assets/images/logo/favicon.png"> -->

    <!-- Core css -->
    <link href="../assets/css/app.min.css" rel="stylesheet">

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
                                    <h4>Edit Data penilaian</h4>
                                    <br>
                                    <form action="update_penilaian.php?id=<?php echo $id_data ?>" method="post">
                                        <div class="form-group">
                                            <label for="selectAlternatif">Alternatif</label>
                                            <input type="text" class="form-control" id="inputalternatif"
                                                name="inputalternatif" value="<?php echo $nama ?>"
                                                placeholder="Masukan Alternatif..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jeniskelamin">Jenis Kelamin</label>
                                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                                <option value="laki-laki"
                                                    <?php echo ($jeniskelamin == 'laki-laki') ? 'selected' : ''; ?>>
                                                    Laki-laki</option>
                                                <option value="perempuan"
                                                    <?php echo ($jeniskelamin == 'perempuan') ? 'selected' : ''; ?>>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnama">Umur (Bulan)</label>
                                            <input type="text" class="form-control" id="inputumur" name="inputumur"
                                                value="<?php echo $umur ?>" placeholder="Masukan Umur (Bulan)..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnama">Berat (KG)</label>
                                            <input type="text" class="form-control" id="inputberat" name="inputberat"
                                                value="<?php echo $berat ?>" placeholder="Masukan Berat (KG)..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnama">Tinggi (CM)</label>
                                            <input type="text" class="form-control" id="inputtinggi" name="inputtinggi"
                                                value="<?php echo $tinggi ?>" placeholder="Masukan Tinggi (CM)..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnama">Lingkar Lengan (CM)</label>
                                            <input type="text" class="form-control" id="inputlila" name="inputlila"
                                                value="<?php echo $lila ?>" placeholder="Masukan Lingkar Lengan (CM)..."
                                                required>
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Update Data">
                                        <!-- <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button> -->
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
    <script src="../assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="../assets/js/app.min.js"></script>

</body>

</html>