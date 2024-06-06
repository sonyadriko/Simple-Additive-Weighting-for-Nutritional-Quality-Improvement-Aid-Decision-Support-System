
<?php 
    include '../config/database.php';

    $id_data = $_GET['id'];
    $nama = $_POST['inputnama'];
    $jeniskel = $_POST['jeniskelamin'];
    $query = "UPDATE alternatif set nama_alternatif = '".$nama."', jenis_kelamin = '".$jeniskel."' where id_alternatif  = '".$id_data."'";
    $result = mysqli_query($conn, $query);
    if($result){
        header("Location:alternatif.php");
    }else {
        header('please check again');
    }

?>
