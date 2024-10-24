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
        <link rel="stylesheet" href="assets/kategoris.css">
        <script src="https://kit.fontawesome.com/7105381104.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
        <div class="container">
            <div class="navbar">
                <a href="homepage.php"><img src="assets/Logo atas.svg" class="logo"></a>
                <div class="profile">
                <a onclick="togglePopUp()" href="#"><img src="profil/<?php echo isset($_SESSION['profil']) ? $_SESSION['profil'] : 'profil tanpa tulisan.svg'; ?>" class="profile-icon"></a>
                </div>
                <div class="PopUp" id="PopUpId">
                <div class="profile-container">
                <div class="username">
                
                <img src="profil/<?php echo isset($_SESSION['profil']) ? $_SESSION['profil'] : 'profil tanpa tulisan.svg'; ?>" class ="profilepicture">
                  
                <h6><?php echo $_SESSION['username']?></h6>
                </div>
                <a href="settings.php">PENGATURAN</a>
                <a href="logout.php">KELUAR</a>
            </div>
            </div>
       </div>
       </div>
       </header>
       <div class="grid-container">
        <div class="grid-box">
        <div class="grid-item">
          <img src="assets/klasik.jpg" class="horizontal">
          <a href="klasik.php" class="category-button klasik">KLASIK</a>
        </div>
      </div>
      <div class="grid-box">
        <div class="grid-item">
          <img src="assets/modern.jpg" class="horizontal">
          <a href="modern.php" class="category-button klasik">MODERN</a>
        </div>
      </div>
      </div>
      <br>
      <div class="koleksi">
        <h4>Kembali ke</h4>
        <a href="homepage.php" type="submit" class="submit-button">KOLEKSI</a>
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