<?php
session_start();
include "koneksi.php";
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; 

    if (empty($email) || empty($password)) {
        $error_message = "Email and password must be filled out.";
    } else {
        $sql = "SELECT * FROM newuser WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['profil'] = $user['profil_picture'];
            $_SESSION['tentang'] = $user['tentang'];
            header("Location: homepage.php");
            exit();
        } else {
            $error_message = "Invalid username or password.";
        }
    }
}

if ($error_message) {
    echo "<script type='text/javascript'>var errorMessage = '$error_message';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/style_login.css">
    <title>GalArt | Masuk & Daftar</title>
</head>
<body background="assets/lake.jpg">
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <a href="index.php"><img src="assets/logo yg bener.png" width="200" height="150"></a>
        </div>
    </nav>
 
    <div class="form-box">
        

        <form class="login-container" id="login" action="" method="POST" onsubmit="return validateForm()">
            <div class="top">
                <span>Tidak punya akun? <a href="register.php">Sign Up!</a></span>
                <header>Login</header>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Email" name="email" id="email">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Kata sandi" name="password" id="password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class ="input-box">
                <input type="submit" class="submit" value="Masuk">
            </div>
        </form>
        <div class="register-container" id="register">
            <div class="top">
                <span>Sudah punya akun? <a href="#" onclick="login()">Masuk</a></span>
                <header>Sign Up</header>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Nama depan">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Nama belakang">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Kata sandi">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Daftar">
            </div>
        </div>
    </div>
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

    function validateForm() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        if (email == "" || password == "") {
            alert("Email and password must be filled out");
            return false;
        }
        return true;
    }

    if (typeof errorMessage !== 'undefined' && errorMessage) {
        alert(errorMessage);
    }
</script>
</body>
</html>
