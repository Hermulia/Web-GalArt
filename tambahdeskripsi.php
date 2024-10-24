<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Art</title>
    <link rel="stylesheet" href="assets/tambahdeskripsi.css">
    <script src="https://kit.fontawesome.com/7105381104.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
        <div class="container">
            <div class="navbar">
                <a href="homepage.php"><img src="assets/Logo atas.svg" class="logo"></a>
                <nav>
                    <ul>
                        <li><a href="homepage.php">KOLEKSI</a></li>
                        <li><a href="kategori.php">KATEGORI</a></li>
                        <li><a href="">TAMBAH</a></li>
                    </ul>
                </nav>
                <!-- <div class="profile">

                </div>
                <div class="PopUp" id="PopUpId">
                <div class="profile-container">
                <div class="username">
        
                    
              
                </div>
                <a href="settings.php">SETTING</a>
                <a href="index.php">LOGOUT</a>
            </div>
            </div> -->
        </div>
       </div>
       </header>
    <div class="container-form">
        <div class="form-box">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <!-- <input type="text"> -->
                <input hidden type="text" id="user_id" name="user_id" value="<?= $_SESSION['id'] ?>">
                    <div class="image-upload">
                    <input type="file" id="file-input" name="image">
                </div>
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" cols="70" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="contact">Kontak</label>
                    <input type="text" id="contact" name="contact">
                </div>
                <div class="form-group">
                    <label for="category">Kategori</label>
                    <select id="category" name="category">
                        <option value="">Pilih Kategori</option>
                        <option value=1>Klasik</option>
                        <option value=2>Modern</option>
                    </select>
                </div>
                <button type="submit" class="submit-button">Simpan Data</button>
            </form>
        </div>
    </div>
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
    <script>
        const popup = document.getElementById("PopUpId");
        function togglePopUp() {
            popup.classList.toggle("openPopUp")
        }
    </script> 
</body>
</html>
