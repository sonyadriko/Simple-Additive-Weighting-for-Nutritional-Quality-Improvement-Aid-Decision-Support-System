<?php
// save_data.php
include 'koneksi.php';

// Retrieve data from the request
$data = json_decode(file_get_contents("php://input"), true);

$detailDataArray = $data['detailDataArray'];

foreach ($detailDataArray as $detailData) {
    $id_hasil = mysqli_real_escape_string($conn, $detailData['id_hasil']);
    $id_rule = mysqli_real_escape_string($conn, $detailData['nama_alternatif']);
    $support = mysqli_real_escape_string($conn, $detailData['number']);
    $confidence = mysqli_real_escape_string($conn, $detailData['rank']);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO detail_hasil (`id_hasil`, `nama_alternatif`, `hasil_akhir`, `ranking`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $id_hasil, $id_rule, $support, $confidence);

    if ($stmt->execute()) {
        echo "Data successfully saved.";
    } else {
        echo "Error: " . $stmt->error;
        // You may choose to break the loop or handle the error in another way
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>
