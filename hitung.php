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
                                <h4>Hitung</h4>

                                    <!-- <a href="tambah_penilaian.php" class="btn btn-primary btn-user">Tambah penilaian</a> -->
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Alternatif</th>
                                                    <th scope="col">C1</th>
                                                    <th scope="col">C2</th>
                                                    <th scope="col">C3</th>
                                                    <th scope="col">C4</th>
                                                    <!-- <th scope="col">penilaian</th> -->
                                                    <th scope="col">C5</th>
                                                    <!-- <th scope="col">Handle</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no = 1;
                                                $get_data = mysqli_query($conn, "SELECT * FROM penilaian 
                                                JOIN alternatif ON alternatif.id_alternatif = penilaian.id_alternatif");

                                                while($display = mysqli_fetch_array($get_data)) {
                                                    $id = $display['id_penilaian'];
                                                    $nama = $display['nama_alternatif'];
                                                    $jenis_kelamin = $display['jenis_kelamin'];
                                                    $umur = $display['umur'];
                                                    $berat = $display['berat'];
                                                    $tinggi = $display['tinggi'];
                                                    $lila = $display['lila'];
                                                    // Assuming you have values for BB_ANAK, BB_MEDIAN, and NILAI BB PADA (-1SD)
                                                  
                                                    $medianWeights['laki-laki'] = [
                                                        3.3, 4.5, 5.6, 6.4, 7.0, 7.5, 7.9, 8.3, 8.6, 8.9, 9.2, 9.4,
                                                        9.6, 9.9, 10.1, 10.3, 10.5, 10.7, 10.9, 11.1, 11.3, 11.5, 11.8, 12.0,
                                                        12.2, 12.4, 12.5, 12.7, 12.9, 13.1, 13.3, 13.5, 13.7, 13.8, 14.0, 14.2,
                                                        14.3, 14.5, 14.7, 14.8, 15.0, 15.2, 15.3, 15.5, 15.7, 15.8, 16.0, 16.2,
                                                        16.3, 16.5, 16.7, 16.8, 17.0, 17.2, 17.3, 17.5, 17.7, 17.8, 18.0, 18.2,
                                                    ];
                                                    
                                                    // Median weight untuk Perempuan (P)
                                                    $medianWeights['perempuan'] = [
                                                        3.2, 4.2, 5.1, 5.8, 6.4, 6.9, 7.3, 7.6, 7.9, 8.2, 8.5, 8.7,
                                                        8.9, 9.2, 9.4, 9.6, 9.8, 10.0, 10.2, 10.4, 10.6, 10.9, 11.1, 11.3,
                                                        11.5, 11.7, 11.9, 12.1, 12.3, 12.5, 12.7, 12.9, 13.1, 13.3, 13.5, 13.7,
                                                        13.9, 14.1, 14.3, 14.5, 14.6, 14.8, 15.0, 15.2, 15.3, 15.5, 15.6, 15.8,
                                                        16.0, 16.1, 16.3, 16.4, 16.6, 16.8, 16.9, 17.1, 17.2, 17.4, 17.5, 17.7,
                                                    ];

                                                    $datamines['laki-laki'] = [
                                                        2.9, 3.9, 4.9, 5.7, 6.2, 6.7, 7.1, 7.4, 7.7, 8.0, 8.2, 8.4,
                                                        8.6, 8.8, 9.0, 9.2, 9.4, 9.6, 9.8, 10.0, 10.1, 10.3, 10.5, 10.7,
                                                        10.8, 11.0, 11.2, 11.3, 11.5, 11.7, 11.8, 12.0, 12.1, 12.3, 12.4,
                                                        12.6, 12.7, 12.9, 13.0, 13.1, 13.3, 13.4, 13.6, 13.7, 13.8, 14.0,
                                                        14.1, 14.3, 14.4, 14.5, 14.7, 14.8, 15.0, 15.1, 15.2, 15.4, 15.5,
                                                        15.6, 15.8, 15.9, 16.0, 16.2,
                                                    ];
                                                    

                                                    $datamines['perempuan'] = [
                                                        2.8, 3.6, 4.5, 5.2, 5.7, 6.1, 6.5, 6.8, 7.0, 7.3, 7.5, 7.7,
                                                        7.9, 8.1, 8.3, 8.5, 8.7, 8.9, 9.1, 9.3, 9.5, 9.8, 10.0, 10.2,
                                                        10.3, 10.5, 10.7, 10.9, 11.1, 11.4, 11.6, 11.7, 11.9, 12.0, 12.2, 12.4,
                                                        12.5, 12.7, 12.8, 13.0, 13.1, 13.3, 13.4, 13.6, 13.7, 13.9, 14.0, 14.2,
                                                        14.3, 14.5, 14.6, 14.8, 15.0, 15.1, 15.3, 15.4, 15.6, 15.8, 15.9, 16.1,
                                                    ];

                                                    $bb_median = $medianWeights[$jenis_kelamin][$umur];
                                                    $dataminesfinal = $datamines[$jenis_kelamin][$umur];

                                                    // Calculate Z-score
                                                    $Zscore = ($berat - $bb_median) / ($bb_median - $dataminesfinal);
                                                    // echo "Berat: " . $berat . "<br>";
                                                    // echo "BB Median: " . $bb_median . "<br>";
                                                    // echo "Data Mines Final: " . $dataminesfinal . "<br>";
                                                    // echo "Nilai Zscore: " . $Zscore . "<br>";

                                                    $medianPanjangBadan['laki-laki'] = [
                                                        49.9, 54.7, 58.4, 61.4, 63.9, 65.9, 67.6, 69.2, 70.6, 72.0, 73.3, 74.5,
                                                        75.7, 76.9, 78.0, 79.1, 80.2, 81.2, 82.3, 83.2, 84.2, 85.1, 86.0, 86.9, 87.8,
                                                    ];

                                                    $medianPanjangBadan['perempuan'] = [
                                                        49.1, 53.7, 57.1, 59.8, 62.1, 64.0, 65.7, 67.3, 68.7, 70.1, 71.5, 72.8,
                                                        74.0, 75.2, 76.4, 77.5, 78.6, 79.7, 80.7, 81.7, 82.7, 83.7, 84.6, 85.5, 86.4,
                                                    ];
                                                    

                                                    $minesPanjangBadan['laki-laki'] = [
                                                        48.0, 52.8, 56.4, 59.4, 61.8, 63.8, 65.5, 67.0, 68.4, 69.7, 71.0, 72.2,
                                                        73.4, 74.5, 75.6, 76.6, 77.6, 78.6, 79.6, 80.5, 81.4, 82.3, 83.1, 83.9, 84.8,
                                                    ];

                                                    $minesPanjangBadan['perempuan'] = [
                                                        47.3, 51.7, 55.0, 57.7, 59.9, 61.8, 63.5, 65.0, 66.4, 67.7, 69.0, 70.3,
                                                        71.4, 72.6, 73.7, 74.8, 75.8, 76.8, 77.8, 78.8, 79.7, 80.6, 81.5, 82.3, 83.2,
                                                    ];
                                                    
                                                    

                                                    $medianTinggiBadan['laki-laki'] = [
                                                        87.1, 88.0, 88.8, 89.6, 90.4, 91.2, 91.9, 92.7, 93.4, 94.1, 94.8, 95.4,
                                                        96.1, 96.7, 97.4, 98.0, 98.6, 99.2, 99.9, 100.6, 101.2, 101.9, 102.6, 103.3,
                                                        104.0, 104.8, 105.4, 106.1, 106.7, 107.4, 108.0, 108.6, 109.2, 109.9, 110.6,
                                                        111.2, 111.8, 112.5, 113.2, 113.9, 114.6, 115.2, 115.9, 116.6, 117.3, 117.9,
                                                        118.6, 119.2, 119.9, 120.6, 121.2, 121.9, 122.6, 123.2, 123.9, 124.6, 125.2,
                                                        125.9, 126.6,
                                                    ];

                                                    $medianTinggiBadan['perempuan'] = [
                                                        85.7, 86.6, 87.4, 88.3, 89.1, 89.9, 90.7, 91.4, 92.2, 92.9, 93.6, 94.4,
                                                        95.1, 95.7, 96.4, 97.1, 97.7, 98.4, 99.0, 99.7, 100.3, 101.0, 101.7, 102.4,
                                                        103.1, 103.8, 104.4, 105.1, 105.7, 106.4, 107.1, 107.9, 108.6, 109.3, 110.0,
                                                        110.6, 111.2, 111.9, 112.5, 113.2, 113.9, 114.6, 115.2, 115.9, 116.6, 117.3,
                                                        117.9, 118.6, 119.2, 119.9, 120.6, 121.2, 121.9, 122.6, 123.2, 123.9, 124.6,
                                                    ];

                                                    $minesTinggiBadan['laki-laki'] = [
                                                        84.1, 84.9, 85.6, 86.4, 87.1, 87.8, 88.5, 89.2, 89.9, 90.5, 91.1, 91.8,
                                                        92.4, 93.0, 93.6, 94.2, 94.7, 95.3, 95.9, 96.4, 97.0, 97.5, 98.1, 98.6,
                                                        99.1, 99.7, 100.2, 100.7, 101.2, 101.7, 102.3, 102.8, 103.3, 103.8, 104.3,
                                                        104.8, 105.3, 105.8, 106.3, 106.7, 107.2, 107.8, 108.3, 108.9, 109.4, 109.9,
                                                        110.4, 110.9, 111.4, 111.7, 112.2, 112.8, 113.3, 113.9, 114.4, 115.0, 115.5,
                                                    ];
                                                    

                                                    $minesTinggiBadan['perempuan'] = [
                                                        82.5, 83.3, 84.1, 84.9, 85.7, 86.4, 87.1, 87.9, 88.6, 89.3, 89.9, 90.6,
                                                        91.2, 91.9, 92.5, 93.1, 93.8, 94.4, 95.0, 95.6, 96.1, 96.7, 97.3, 97.9,
                                                        98.4, 99.0, 99.5, 100.1, 100.7, 101.2, 101.9, 102.7, 103.4, 104.2, 104.8,
                                                        105.6, 106.1, 106.7, 107.3, 107.9, 108.4, 109.0, 109.5, 110.0, 110.6, 111.1,
                                                        111.7, 112.2, 112.7, 113.3, 113.8, 114.4, 114.9, 115.5, 116.1, 116.7, 117.2,
                                                    ];
                                                    


                                                    if($umur > 24){
                                                        $tb_median = $medianTinggiBadan[$jenis_kelamin][$umur - 24];
                                                        $dataminestb = $minesTinggiBadan[$jenis_kelamin][$umur - 24];
                                                        $Zscoretb = ($tinggi - $tb_median) / ($tb_median - $dataminestb);
                                                    }else {
                                                        $tb_median = $medianPanjangBadan[$jenis_kelamin][$umur];
                                                        $dataminestb = $minesPanjangBadan[$jenis_kelamin][$umur];
                                                        $Zscoretb = ($tinggi - $tb_median) / ($tb_median - $dataminestb);
                                                    }




                                                    $medianBeratBadan['laki-laki'] = [
                                                        2.4, 2.5, 2.6, 2.7, 2.8, 2.9, 2.9, 3.0, 3.1, 3.2, 3.3, 3.4, 3.5, 3.6, 3.8, 3.9, 4.0, 4.1, 4.3, 4.4, 4.5, 4.7, 4.8, 5.0, 5.1, 5.3, 5.4, 5.6, 5.7, 5.9, 6.0, 6.1, 6.3, 6.4, 6.5, 6.7, 6.8, 6.9, 7.0, 7.1, 7.3
                                                    ];
                                      
                                                    $sdMinusOneBeratBadan['laki-laki'] = [
                                                        2.2, 2.3, 2.4, 2.5, 2.5, 2.6, 2.7, 2.8, 2.9, 3.0, 3.0, 3.1, 3.2, 3.3, 3.5, 3.6, 3.7, 3.8, 3.9, 4.0, 4.2, 4.3, 4.4, 4.6, 4.7, 4.9, 5.0, 5.1, 5.3, 5.4, 5.5, 5.6, 5.8, 5.9, 6.0, 6.1, 6.2, 6.4, 6.5, 6.6, 6.7
                                                    ];

                                                    
                                                    
                                                    $medianBeratBadan['perempuan'] = [
                                                        2.5, 2.7, 3.0, 3.3, 3.6, 4.0, 4.3, 4.6, 4.9, 5.2,
                                                        5.4, 5.7, 6.1, 6.4, 6.8, 7.2, 7.7, 8.1, 8.5, 8.9,
                                                        9.3, 9.7, 10.1, 10.5, 11.0, 11.5
                                                    ];

                                                    $sdMinusOneBeratBadan['perempuan'] = [
                                                        2.0, 2.1, 2.3, 2.5, 2.8, 3.1, 3.4, 3.7, 4.0, 4.3,
                                                        4.6, 4.8, 5.1, 5.5, 5.9, 6.4, 6.9, 7.5, 8.2, 8.9,
                                                        9.6, 10.3, 11.0, 11.7, 12.4, 13.2
                                                    ];



                                                    $medianBBTB['laki-laki'] = [
                                                        7.4, 7.6, 7.7, 7.8, 7.9, 8.0, 8.1, 8.2, 8.4, 8.5,
                                                        8.6, 8.7, 8.8, 8.9, 9.0, 9.1, 9.2, 9.3, 9.5, 9.6,
                                                        9.7, 9.8, 9.9, 10.0, 10.1, 10.2, 10.3, 10.4, 10.6, 10.7,
                                                        10.8, 10.9, 11.0, 11.1, 11.2, 11.3, 11.4, 11.5, 11.7, 11.8,
                                                        11.9, 12.0, 12.1, 12.2, 12.3, 12.4, 12.6, 12.7, 12.8, 12.9,
                                                        13.0, 13.1, 13.2, 13.3, 13.4, 13.6, 13.7, 13.8, 13.9, 14.0,
                                                        14.1, 14.2, 14.3, 14.4, 14.5, 14.7, 14.8, 14.9, 15.1, 15.2,
                                                        15.3, 15.5, 15.6, 15.8, 15.9, 16.1, 16.2, 16.4, 16.5, 16.7,
                                                        16.8, 17.0, 17.1, 17.3, 17.5, 17.6, 17.8, 17.9, 18.1, 18.3,
                                                        18.4, 18.6, 18.8, 19.0, 19.2, 19.4, 19.6, 19.7, 19.9, 20.1
                                                    ];

                                                    $minusMedianBBTB['laki-laki'] = [
                                                        6.9, 7.0, 7.1, 7.2, 7.3, 7.4, 7.5, 7.6, 7.7, 7.8,
                                                        7.9, 8.0, 8.1, 8.2, 8.3, 8.4, 8.5, 8.6, 8.7, 8.8,
                                                        8.9, 9.0, 9.1, 9.2, 9.3, 9.4, 9.5, 9.6, 9.7, 9.8,
                                                        9.9, 10.0, 10.1, 10.2, 10.3, 10.4, 10.5, 10.6, 10.7, 10.8,
                                                        10.9, 11.0, 11.1, 11.2, 11.3, 11.4, 11.5, 11.6, 11.7, 11.8,
                                                        11.9, 12.0, 12.1, 12.2, 12.3, 12.4, 12.5, 12.6, 12.7, 12.8,
                                                        12.9, 13.0, 13.1, 13.2, 13.3, 13.4, 13.5, 13.6, 13.7, 13.8,
                                                        13.9, 14.0, 14.1, 14.2, 14.3, 14.4, 14.5, 14.6, 14.7, 14.8,
                                                        14.9, 15.0, 15.1, 15.2, 15.3, 15.4, 15.5, 15.6, 15.7, 15.8,
                                                        15.9, 16.0, 16.1, 16.2, 16.3, 16.4, 16.5, 16.6, 16.7, 16.8
                                                    ];

                                                    $medianBBTB['perempuan'] = [
                                                        7.2, 7.4, 7.5, 7.6, 7.7, 7.8, 7.9, 8.0, 8.1, 8.2, 8.3, 8.4, 8.5, 8.7, 8.8, 8.9, 9.0, 9.1, 9.3, 9.4,
                                                        9.5, 9.7, 9.8, 9.9, 10.0, 10.1, 10.2, 10.3, 10.5, 10.6, 10.8, 10.9, 11.0, 11.1, 11.2, 11.3, 11.4, 11.6,
                                                        11.7, 11.8, 12.0, 12.1, 12.2, 12.3, 12.4, 12.5, 12.6, 12.7, 12.8, 13.0, 13.1, 13.3, 13.4, 13.5, 13.7,
                                                        13.8, 14.0, 14.1, 14.3, 14.4, 14.6, 14.7, 14.9, 15.0, 15.2, 15.3, 15.5, 15.7, 15.9, 16.0, 16.2, 16.3,
                                                        16.5, 16.7, 16.8, 17.0, 17.2, 17.3, 17.5, 17.7, 17.8, 18.0, 18.2, 18.4, 18.6, 18.8, 19.0, 19.2, 19.4,
                                                        19.6, 19.8, 20.0, 20.2, 20.5, 20.7, 20.9, 21.1, 21.3, 21.5, 21.7, 21.8, 22.0, 22.2, 22.4, 22.6, 22.8,
                                                        23.0, 23.2, 23.5, 23.7, 24.0, 24.2, 24.5, 24.8, 25.1, 25.4, 25.7, 26.0, 26.1, 26.3, 26.6, 26.9, 27.1,
                                                        27.4, 27.8, 28.1, 28.4, 28.7, 29.0, 29.3, 29.6, 29.9, 30.3, 30.6, 30.9, 31.2
                                                    ];
                                                    

                                                    $minusMedianBBTB['perempuan'] = [
                                                        6.6, 6.7, 6.8, 6.9, 7.0, 7.1, 7.2, 7.3, 7.4, 7.5, 7.6, 7.7, 7.8, 7.9, 8.0, 8.1, 8.1, 8.2, 8.3, 8.4,
                                                        8.5, 8.6, 8.7, 8.7, 8.8, 8.9, 9.0, 9.1, 9.2, 9.3, 9.4, 9.5, 9.6, 9.7, 9.8, 9.9, 10.0, 10.1, 10.2, 10.3,
                                                        10.4, 10.6, 10.7, 10.8, 10.9, 11.0, 11.1, 11.2, 11.4, 11.5, 11.6, 11.7, 11.8, 11.9, 12.0, 12.1, 12.3, 12.4,
                                                        12.5, 12.6, 12.7, 12.8, 12.9, 13.1, 13.2, 13.3, 13.4, 13.5, 13.7, 13.8, 13.9, 14.1, 14.2, 14.3, 14.5, 14.6,
                                                        14.7, 14.9, 15.0, 15.2, 15.3, 15.5, 15.6, 15.8, 15.9, 16.1, 16.3, 16.4, 16.6, 16.8, 17.0, 17.1, 17.3, 17.5,
                                                        17.7, 17.9, 18.0, 18.2, 18.4, 18.6, 18.8, 19.0, 19.2, 19.4, 19.6, 19.8, 19.9, 20.1, 20.3, 20.5, 20.7
                                                    ];
                                                    


                                                   
                                                    if($tinggi > 65){
                                                        $c3_median = $medianBBTB[$jenis_kelamin][$umur];
                                                        $dataminesc3 = $minusMedianBBTB[$jenis_kelamin][$umur];
                                                        $Zscorec3 = ($berat - $c3_median) / ($c3_median - $dataminesc3);
                                                    }else{
                                                        $c3_median = $medianBeratBadan[$jenis_kelamin][$tinggi - 31];
                                                        $dataminesc3 = $sdMinusOneBeratBadan[$jenis_kelamin][$tinggi - 31];
                                                        $Zscorec3 = ($berat - $c3_median) / ($c3_median - $dataminesc3); 
                                                    }

                                                    // echo "Berat: " . $berat . "<br>";
                                                    // echo "BB Median: " . $c3_median . "<br>";
                                                    // echo "Data Mines Final: " . $dataminesc3 . "<br>";
                                                    // echo "Nilai Zscore: " . $Zscorec3 . "<br>";

                                                    if ($jenis_kelamin == 'perempuan') {
                                                        $ll = ($lila / 16) * 100;
                                                        // $hasil_bulat = number_format($ll, 1, '.', '');
                                                    } else {
                                                        $ll = ($lila / 16.2) * 100;
                                                    }
                                                    // $hasil_bulat = number_format($ll, 1, '.', '');
                                                    $hasil_bulat = floor($ll * 10) / 10;

                                                    
                                                  
                                                    // echo "Tinggi: " . $tinggi . "<br>";
                                                    // echo "TB Median: " . $tb_median . "<br>";
                                                    // echo "Data Mines Final: " . $dataminestb . "<br>";
                                                    // echo "Nilai Zscore: " . $Zscoretb . "<br>";
                                                                                                 
                                                    if ($Zscore < -3) {
                                                        $kategori = "Berat Badan Sangat Kurang (Severely Underweight)";
                                                    } elseif ($Zscore >= -3 && $Zscore <= -2) {
                                                        $kategori = "Berat Badan Kurang (Underweight)";
                                                    } elseif ($Zscore >= -2 && $Zscore <= 1) {
                                                        $kategori = "Berat Badan Normal";
                                                    } else {
                                                        $kategori = "Risiko Berat Badan Lebih (Overweight)";
                                                    }

                                                    if ($Zscoretb < -3) {
                                                        $kategoritb = "Sangat Pendek (Severely Stunted)";
                                                    } elseif ($Zscoretb >= -3 && $Zscoretb <= -2) {
                                                        $kategoritb = "Pendek (Stunted)";
                                                    } elseif ($Zscoretb >= -2 && $Zscoretb <= 3) {
                                                        $kategoritb = "Normal";
                                                    } else {
                                                        $kategoritb = "Tinggi (Stunted)";
                                                    }
                                                ?>
                                                <td class="text-truncate"><?php echo $no ?></td>
                                                <td class="text-truncate"><?php echo $nama ?></td>
                                                <td class="text-truncate"><?php echo $kategori . " " . $Zscore ?> </td>
                                                <td class="text-truncate"><?php echo $kategoritb . " " . $Zscoretb ?> </td>
                                                <td class="text-truncate"><?php echo $tinggi ?> </td>
                                                <td class="text-truncate"><?php echo $hasil_bulat ?> </td>
                                               
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