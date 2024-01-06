<?php 
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_penilaian = $_GET['id'];  // Assuming 'id' is the parameter in your URL
    $umur = $_POST['inputumur'];
    $berat = $_POST['inputberat'];
    $tinggi = $_POST['inputtinggi'];
    $lila = $_POST['inputlila'];

    $query = "UPDATE penilaian SET umur = '$umur', berat = '$berat', tinggi = '$tinggi', lila = '$lila' WHERE id_penilaian = '$id_penilaian'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: penilaian.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
