<?php
// save_data.php
include 'koneksi.php';
// Retrieve data from the request
$data = json_decode(file_get_contents("php://input"), true);

$detailDataArray = $data['detailDataArray'];

foreach ($detailDataArray as $detailData) {
    $id_hasil = $detailData['id_hasil'];
    $id_rule = $detailData['nama_alternatif'];
    $support = $detailData['number'];
    $confidence = $detailData['rank'];

    // Query untuk menyimpan data ke tabel detail_hasil
    $sql = "INSERT INTO detail_hasil (`id_hasil`, `nama_alternatif`, `hasil_akhir`, `ranking`) VALUES ('$id_hasil', '$id_rule', '$support', '$confidence')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // You may choose to break the loop or handle the error in another way
    }
}

// Close the database conn
mysqli_close($conn);
?>
