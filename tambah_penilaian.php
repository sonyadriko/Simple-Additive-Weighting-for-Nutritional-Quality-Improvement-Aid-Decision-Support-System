<?php
 include 'koneksi.php';
 session_start();
  if (!isset($_SESSION['id_admin'])) {
      header("Location: login.php");
  }
  $queryAlternatif = mysqli_query($conn, "SELECT * FROM alternatif");
$alternatifData = mysqli_fetch_all($queryAlternatif, MYSQLI_ASSOC);
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
                                    <h4>Tambah Data penilaian</h4>
                                    <br>
                                    <form action="tambah_penilaian.php" method="post">
                                        <div class="form-group">
                                            <label for="selectAlternatif">Alternatif</label>
                                            <select class="form-control" id="selectAlternatif" name="selectAlternatif">
                                                <?php
                                                foreach ($alternatifData as $alternatif) {
                                                    echo '<option value="' . $alternatif['id_alternatif'] . '">' . $alternatif['nama_alternatif'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnama">Umur (Bulan)</label>
                                            <input type="text" class="form-control" id="inputumur" name="inputumur" placeholder="Masukan Umur (Bulan)..." required>       
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnama">Berat (KG)</label>
                                            <input type="text" class="form-control" id="inputberat" name="inputberat" placeholder="Masukan Berat (KG)..." required>       
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnama">Tinggi (CM)</label>
                                            <input type="text" class="form-control" id="inputtinggi" name="inputtinggi" placeholder="Masukan Tinggi (CM)..." required>       
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnama">Lingkar Lengan (CM)</label>
                                            <input type="text" class="form-control" id="inputlila" name="inputlila" placeholder="Masukan Lingkar Lengan (CM)..." required>       
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
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_alternatif = $_POST['selectAlternatif'];

    // Validate and sanitize other input fields
    $umur = mysqli_real_escape_string($conn, $_POST['inputumur']);
    $berat = mysqli_real_escape_string($conn, $_POST['inputberat']);
    $tinggi = mysqli_real_escape_string($conn, $_POST['inputtinggi']);
    $lingkar_lengan = mysqli_real_escape_string($conn, $_POST['inputlila']);

    // Check if the id_alternatif already exists
    $checkQuery = "SELECT * FROM penilaian WHERE id_alternatif = '$id_alternatif'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // If the id_alternatif already exists, display an alert
        echo "<script>alert('Data untuk Alternatif ini sudah ada.')</script>";
    } else {
        // Insert data into 'penilaian' table using prepared statements
        $insertData = $conn->prepare("INSERT INTO penilaian (id_penilaian, id_alternatif, umur, berat, tinggi, lila) 
                                      VALUES (NULL, ?, ?, ?, ?, ?)");

        // Bind parameters
        $insertData->bind_param("sssss", $id_alternatif, $umur, $berat, $tinggi, $lingkar_lengan);

        // Execute the prepared statement
        $insertResult = $insertData->execute();

        if ($insertResult) {
            echo "<script>alert('Berhasil menambah data penilaian.')</script>";
            echo "<script>window.location.href = 'penilaian.php';</script>";
            // Alternatively, you can use: echo "<script>location.reload();</script>";
        } else {
            // Handle the error
            echo "<script>alert('Gagal menambah data penilaian.')</script>";
            echo "<script>console.error('Error: " . $insertData->error . "')</script>";
            // You can log the error, display a custom message, or take other actions as needed
        }

        // Close the prepared statement
        $insertData->close();
    }
}
?>


