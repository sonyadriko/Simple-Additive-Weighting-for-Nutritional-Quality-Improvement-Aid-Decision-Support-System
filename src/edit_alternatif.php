<?php
 include '../config/database.php';
 session_start();
  if (!isset($_SESSION['id_admin'])) {
      header("Location: login.php");
  }

    $id_data = $_GET['GetID'];
    $query = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_alternatif = '".$id_data."'");
    while($row = mysqli_fetch_assoc($query)){
        $nama = $row['nama_alternatif'];
        $jeniskelamin = $row['jenis_kelamin'];
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
                                    <h4>Edit Data Alternatif</h4>
                                    <br>
                                    <form action="update_alternatif.php?id=<?php echo $id_data ?>" method="post">
                                        <div class="form-group">
                                            <label for="inputnama">Nama</label>
                                            <input type="text" class="form-control" id="inputnama" name="inputnama" value="<?php echo $nama ?>" placeholder="Nama Alternatif">       
                                        </div>
                                        <div class="form-group">
                                            <label for="jeniskelamin">Jenis Kelamin</label>
                                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                                <option value="laki-laki" <?php echo ($jeniskelamin == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                <option value="perempuan" <?php echo ($jeniskelamin == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Update Data">

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