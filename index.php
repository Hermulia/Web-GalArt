<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/style_landingpage.css">
    <title>Landing Page</title>
</head>

<body background="assets/lake.jpg">
    <div class="top-container">
        <nav class="nav">
            <div class="nav-logo">
                <img src="assets/logo yg bener.png">
            </div>

            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn"><a href="register.php">SignUp</a></button>
                <button class="btn white-btn" id="registerBtn"><a href="login.php">Login</a></button>
            </div>
        </nav>

        <div class="container">
            <h1>Selamat datang di</h1>
            <h2>Galart</h2>
        </div>
    </div>

    <div class="art-image" id="image1">
        <img src="assets/Seni Klasik + Slogan.png" alt="">
    </div>

    <div class="koleksi">
        <h2 class="judul-koleksi">KOLEKSI</h2>
        <div class="gal-koleksi">
            <div class="gal-per-koleksi">
                <div class="galeri">
                <a href="login.php"><img src="assets/blossoms.jpg" alt="" width></a>
                </div>
            </div>
            <div class="gal-per-koleksi">
                <div class="galeri">
                <a href="login.php"><img src="assets/ellie.jpeg" alt=""></a>
                </div>
            </div>
            <div class="gal-per-koleksi">
                <div class="galeri">
                <a href="login.php"><img src="assets/nyiroro.jpg" alt=""></a>
                </div>
            </div>
            <div class="gal-per-koleksi">
                <div class="galeri">
                    <a href="login.php"><img src="assets/tarian.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <footer class="kaki">
            <img src="assets/logo bawah.png">
            <div class="tentang">
                <h4>Tentang Kami</h4>
                <p>Platform yang berisi berbagai karya seni dari berbagai aliran.</p>
            </div>
            <div class="social">
                <center><h4>Ikuti Kami</h></center>
                <div class="sosmed">
                    <a href="https://www.instagram.com/"><img src="assets/Instagram.svg"></a>
                    <a href="https://mail.google.com/"><img src="assets/Gmail Logo.svg"></a>
                    <a href="https://api.whatsapp.com/"><img src="assets/WhatsApp.svg"></a>
                </div>
            </div>
        </footer>
        <div class="copyright">
            &copy; GalArt 2024
        </div>
    </div>

    <script>
    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var loginForm = document.getElementById("login");
    var registerForm = document.getElementById("register");

    a.onclick = function() {
        loginForm.style.left = "4px";
        registerForm.style.right = "-520px";
        a.classList.add("white-btn");
        b.classList.remove("white-btn");
    };

    b.onclick = function() {
        loginForm.style.left = "-510px";
        registerForm.style.right = "5px";
        a.classList.remove("white-btn");
        b.classList.add("white-btn");
    };
</script>


</body>

</html>
