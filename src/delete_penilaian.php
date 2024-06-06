<?php 
	
	include '../config/database.php';

	if (isset($_GET['Del'])) {
		// code...
		$id_alternatif = $_GET['Del'];
		$query = "DELETE FROM penilaian WHERE id_penilaian = '".$id_alternatif."'";
		$result = mysqli_query($conn, $query);

		if ($result) {
			// code...
			header("Location:penilaian.php");
		}else {
			echo "Please Check Again";
		}
	}
?>