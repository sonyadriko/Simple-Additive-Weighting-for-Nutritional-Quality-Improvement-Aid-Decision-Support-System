<?php 
include '../config/database.php';

if (isset($_POST['submit'])) {
    $id_penilaian = $_GET['id'];  // Assuming 'id' is the parameter in your URL
    $alternatif = $_POST['inputalternatif'];
    $jenis_kelamin = $_POST['jeniskelamin'];
    $umur = $_POST['inputumur'];
    $berat = $_POST['inputberat'];
    $tinggi = $_POST['inputtinggi'];
    $lila = $_POST['inputlila'];

    $query = "UPDATE penilaian SET alternatif = '$alternatif', jenis_kelamin = '$jenis_kelamin', umur = '$umur', berat = '$berat', tinggi = '$tinggi', lila = '$lila' WHERE id_penilaian = '$id_penilaian'";
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
