<?php
include "koneksi.php";
session_start();

//mencari berdasarkan query judul lukisan
$cari = isset($_GET['cari']) ? $_GET['cari'] : "";
if ($cari) {
  $sql = "SELECT * FROM uploads JOIN newuser USING(user_id) WHERE title LIKE '%$cari%' OR newuser.username LIKE '%$cari%' ";
} else {
  $sql = "SELECT * FROM uploads";
}
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery Art</title>
  <link rel="stylesheet" href="assets/homepages.css">
  <script src="https://kit.fontawesome.com/7105381104.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="container">
      <div class="navbar">
        <img src="assets/Logo atas.svg" class="logo">
        <div class="search-box">
          <form action="" method="GET">
            <input name="cari" type="text" placeholder="Search..." />
          </form>
        </div>
        <nav>
          <ul>
            <li><a href="homepage.php">KOLEKSI</a></li>
            <li><a href="kategori.php">KATEGORI</a></li>
            <li><a href="tambahdeskripsi.php">TAMBAH</a></li>
          </ul>
        </nav>
        <div class="profile">
          <a onclick="togglePopUp()" href="#"><img src="profil/<?php echo isset($_SESSION['profil']) ? $_SESSION['profil'] : 'profil tanpa tulisan.svg'; ?>" class="profile-icon"></a>
        </div>
        <div class="PopUp" id="PopUpId">
          <div class="profile-container">
            <div class="username">

              <img src="profil/<?php echo isset($_SESSION['profil']) ? $_SESSION['profil'] : 'profil tanpa tulisan.svg'; ?>" class="profilepicture">

              <h6><?php echo $_SESSION['username'] ?></h6>
            </div>
            <a href="settings.php">PENGATURAN</a>
            <a href="logout.php">KELUAR</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="grid-container">
    <?php if (mysqli_num_rows($result)) { ?>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="grid-box">
          <div class="grid-item">
            <a href="deskripsi.php?id=<?php echo $row['id']; ?>">
              <img src="<?php echo $row['image_path'] ?> " class="horizontal">
            </a>
          </div>
          <div class="rating-container">
            <?php
            // Mendapatkan total rata rata rating untuk satu upload
            $sql = "SELECT ROUND(AVG(rating), 1) AS avg_rating FROM ratings WHERE uploads_id = $row[id]"; // sesuaikan dengan nama tabel Anda
            $resultRating = $conn->query($sql);
            // print_r($resultRating);
            $avgRating = 0;
            if ($resultRating->num_rows > 0) {
              // Mendapatkan hasil
              $rating = $resultRating->fetch_assoc();
              // print_r($rating);
              if ($rating['avg_rating'] > 0) {
                echo'<i class="fa-solid fa-star text-yellow"></i>';
                $avgRating = $rating['avg_rating'];
                } else {
                echo'<i class="fa-regular fa-star text-yellow"></i>';
              }
            }

            echo '<p class="text-white m-0">'. $avgRating.'</p>';
            ?>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
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