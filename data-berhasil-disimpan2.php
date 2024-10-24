<?php
include "koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA BERHASIL DISIMPAN</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/data-berhasil-disimpan2.css">
</head>

<body>
    <header>
        <div class="wrapper">
            <nav>
                <div class="logo"><img src="assets/Logo atas.svg">
                </div>
                <!-- <div class="profile">
                    <a onclick="togglePopUp()" href="#"><img src="Assets GalArt/profil tanpa tulisan.svg"></a>

                </div> -->
            </nav>
        </div>
        <!-- <div class="PopUp" id="PopUpId">
            <div class="profile-container">
                <div class="username">
                    <div class="profilepicture">
                    </div>
                    <h6>username</h6>
                </div>
                <a href="#">SETTING</a>
                <a href="#">LOGOUT</a>
            </div>
        </div> -->
    </header>

    <main class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 disimpan-container">
                <!-- <h1>DESKRIPSI</h1>
                <div class="JuNa">
                    <h6>Judul Lukisan :</h6>
                    <h6>Nama Penulis :</h6>
                </div> -->
                <div class="tengah">
                    <img src="assets/data berhasil disimpan.svg">
                    <h4>DATA BERHASIL DISIMPAN</h4>
                </div>
                <!-- <p class="isian">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p> -->
                <div class="btn-koleksi">
                    <p>kembali ke</p>
                    <a href="homepage.php"><button class="btn">KOLEKSI</button></a>
                </div>
            </div>
        </Div>
        </div>
        <div class="col-md-3">
        </div>
    </main>

    <div class="footer-section">
        <footer class="kaki">
            <img src="assets/logo bawah.png">
            <div class="tentang">
                <h4>Tentang Kami</h4>
                <p>Platform yang berisi berbagai karya seni dari berbagai aliran.</p>
            </div>
            <div class="social">
                <h4>Ikuti Kami</h4>
                <div class="sosmed">
                    <a href="https://www.instagram.com/"><img src="assets/Instagram.svg"></a>
                    <a href="https://mail.google.com/"><img src="assets/Gmail Logo.svg"></a>
                    <a href="https://api.whatsapp.com/"><img src="assets/WhatsApp.svg"></a>
                </div>

            </div>
        </footer>

        <div class="col-12 py-4 copyright">
            &copy; GalArt 2024
        </div>
    </div>

    <!-- <script>
        const popup = document.getElementById("PopUpId");
        function togglePopUp() {
            popup.classList.toggle("openPopUp")
        }
    </script> -->
</body>

</html>