<?php
include "koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $nama_depan = $_POST['nama-depan'];
    $nama_belakang = $_POST['nama-belakang'];
    // $tgl_lahir = $_POST['tanggal-lahir'];
    $tentang = $_POST['tentang'];

    $img_name = $_FILES['foto']['name'];
    $img_size = $_FILES['foto']['size'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];

    if ($error === 0 && !empty($img_name)) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png", "svg", "webp", "heic");

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = 'profil/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $sql = "UPDATE newuser
                    SET username='$username', fname='$nama_depan', lname='$nama_belakang', tentang='$tentang', profil_picture='$new_img_name'
                    WHERE user_id='$id'";
        } else {
            echo "Invalid file type";
            exit();
        }
    } else {
        $sql = "UPDATE newuser
                SET username='$username', fname='$nama_depan', lname='$nama_belakang', tentang='$tentang'
                WHERE user_id='$id'";
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION['username'] = $username;
        if (!empty($new_img_name)) {
            $_SESSION['profil'] = $new_img_name;
        }
        header("Location: homepage.php");
        exit();
    } else {
        echo "Failed to update data";
    }
}
?>
