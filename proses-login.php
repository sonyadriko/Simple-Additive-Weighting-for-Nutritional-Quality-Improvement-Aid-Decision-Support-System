<?php
    include 'koneksi.php';

    session_start();

    if (isset($_SESSION['id_admin'], $_SESSION['nama'])) {
        header("Location: index.php");
    }

    if (isset($_POST['login_input']) && $_POST['login_input'] == 1) {
        $username = $_POST['username'];
        // $password = $_POST['password'];
        $password = (md5($_POST['password']));


        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if ($password == $row['password']) {
                $_SESSION['id_admin'] = $row['id_admin'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];

                echo "<script>alert('Login Berhasil');</script>";
                echo "<script>location='index.php';</script>";
            } else {
                echo "<script>alert('Username dan Password Salah');</script>";
                echo "<script>history.back();</script>";
            }
        } else {
            echo "<script>alert('Username dan Password Salah');</script>";
            echo "<script>history.back();</script>";
        }

        $stmt->close();
        mysqli_close($conn);
    }
?>
