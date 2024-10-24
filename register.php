<?php
require_once "koneksi.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO newuser (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
    if (!move_uploaded_file($tempname, $folder)) {
        echo "<h3> Failed to upload image!</h3>";
    }
    if (mysqli_query($conn, $sql)) {
        $new_user_id = $conn->insert_id;
        $_SESSION['id'] = $new_user_id;
        $_SESSION['email'] = $email;
        // $_SESSION['username'] = $user['username'];
        // $_SESSION['profil'] = $user['profil_picture'];
        header("Location: Login.php");
        exit();
    } else{
        echo "Error: " . mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/style_register.css">
    <title>GalArt | Masuk & Daftar</title>
</head>
<body background="assets/lake.jpg">
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <img src="assets/logo yg bener.png" width="200" height="150">

    </nav>
 
    <form class="form-box" action="" method="POST">
        <div class="login-container" id="login">
            <div class="top">
                <span>Sudah punya akun?<a href="#" onclick="register()"><a href="login.php">Login</a></span>
                <header>Daftar</header>
            </div>

            <div class="nama-lengkap">
                <div class="input-box-nama">
                    <input type="text" class="input-field" placeholder="Nama depan" name="fname">
                    <i class="bx bx-user"></i>
                </div>
    
                <br>

                <div class="input-box-nama">
                    <input type="text" class="input-field" placeholder="Nama belakang" name="lname">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            
            <div class="input-box">
                <input type="email" class="input-field" placeholder="Email" name="email">
                <i class="bx bx-user"></i>
            </div>

            <div class="input-box">
                <input type="password" class="input-field" placeholder="Kata Sandi" name="password">
                <i class="bx bx-user"></i>
            </div>

            <div class="input-box daftar-btn">
                <input type="submit" class="submit" value="Daftar">
            </div>
            <!-- <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="masuk-check">
                    <label for="login-check"> Ingat saya</label>
                </div> -->
            </div>
        </div>
    </form>
</div>   

<script>
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }
    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }
</script>
</body>
</html>