<?php
include 'koneksi.php';

$data = json_decode(file_get_contents("php://input"), true);

// Inisialisasi array respons
$tanggal = $data['tanggal'];


    $sql = "INSERT INTO hasil (`tanggal`) VALUES ('$tanggal')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $response = ['last_id' => $last_id];
    } else {
        $response = ['error' => "Error: " . $sql . "<br>" . $conn->error];
    }


// Mengonversi array respons ke format JSON dan mencetaknya
echo json_encode($response);

$conn->close();
?>
