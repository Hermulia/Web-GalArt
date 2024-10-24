<?php
include "koneksi.php";
session_start();

$id = $_GET['id'];
$sql = "SELECT * FROM uploads JOIN newuser ON uploads.user_id = newuser.user_id WHERE uploads.id = '$id'";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// Fetch the current average rating
// $rating_sql = "SELECT AVG(rating) as avg_rating FROM ratings WHERE uploads_id = '$id'";
// $rating_result = mysqli_query($conn, $rating_sql);
// $rating_data = mysqli_fetch_assoc($rating_result);
// $average_rating = isset($rating_data['avg_rating']) ? round($rating_data['avg_rating'], 2) : '0';

// // Fetch individual ratings
// $individual_ratings_sql = "SELECT ratings.rating, newuser.username FROM ratings JOIN newuser ON ratings.newuser_id = newuser.user_id WHERE ratings.uploads_id = '$id'";
// $individual_ratings_result = mysqli_query($conn, $individual_ratings_sql);

// Memeriksa ketersediaan rating dari pengguna yang sedang login

$sql = "SELECT rating FROM ratings WHERE uploads_id = '$id' AND newuser_id = '$_SESSION[id]'"; // sesuaikan dengan nama tabel Anda
$result = $conn->query($sql);

$ratingValue = 0;
$ratingExists = false;

if ($result->num_rows > 0) {
    // Mendapatkan hasil
    $rating = $result->fetch_assoc();
    $ratingValue = $rating['rating'];
    $ratingExists = true;
    // print_r($rating);
    // if ($rating['rating'] > 0) {
    //     // echo "Ada rating dalam database.";
    // } else {
    //     // echo "Tidak ada rating dalam database.";
    // }
}

// Mendapatkan total rata rata rating untuk satu upload
$sql = "SELECT ROUND(AVG(rating), 1) AS avg_rating FROM ratings WHERE uploads_id = '$id'"; // sesuaikan dengan nama tabel Anda
$result = $conn->query($sql);
// print_r($result);
$avgRating = 0;
if ($result->num_rows > 0) {
    // Mendapatkan hasil
    $rating = $result->fetch_assoc();
    // print_r($rating);
    if ($rating['avg_rating'] > 0) {
        $avgRating = $rating['avg_rating'];
    }
}

if (isset($_POST['submit'])) {
    $uploads_id = $_POST['uploads_id'];
    $newuser_id = $_POST['newuser_id'];
    $rating = $_POST['rating'];

    $insert_ratings_sql = "INSERT INTO ratings (uploads_id, newuser_id, rating) VALUES ('$uploads_id', '$newuser_id', '$rating')";
    $insert_ratings_result = mysqli_query($conn, $insert_ratings_sql);
    if ($insert_ratings_result) {
        echo "
        <script>
            alert('Berhasil menambahkan rating!')
        </script>
        ";
        echo
        '<script>
         window.location.href = " ' . $_SERVER['PHP_SELF'] . ' ?id=' . $id . '";
         </script>
         '; // Redirect ke halaman yang sama

        // header('Location: http://localhost/galart.php');
        // header('Location: ' . $_SERVER['PHP_SELF'].'?id='.$id);
        exit(); // Pastikan skrip berhenti setelah redireksi
    } else {
        echo "
        <script>
            alert('Gagal menambahkan rating!')
        </script>
        ";
    }
}

function timeToDate($tanggal)
{
    // Ubah format tanggal dari YYYY-MM-DD HH:MM:SS ke timestamp
    $timestamp = strtotime($tanggal);

    // Format ulang tanggal menjadi MM/DD/YYYY
    $tanggal_baru = date("m/d/Y", $timestamp);

    return $tanggal_baru;
}

// Contoh penggunaan fungsi
// $tanggal_awal = "2024-06-08 07:59:42";
// $tanggal_hasil = timeToDate($tanggal_awal);
// echo $tanggal_hasil; // Output: 06/08/2024

// function timeToDate($timestamp)
// {
//     // Pastikan bahwa input adalah integer atau string yang dapat dikonversi ke integer
//     if (is_numeric($timestamp)) {
//         // Ubah timestamp menjadi format tanggal/bulan/tahun
//         return date('d/m/Y', $timestamp);
//     } else {
//         return "Input bukan timestamp yang valid.";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESKRIPSI</title>
    <link rel="xconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7105381104.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/deskripsis.css">
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

                            <img src="profil/<?php echo isset($_SESSION['profil']) ? $_SESSION['profil'] : 'profil tanpa tulisan.svg'; ?>" class="profilepicture">

                            <h6><?php echo $_SESSION['username'] ?></h6>
                        </div>
                        <a href="settings.php">SETTING</a>
                        <a href="logout.php">LOGOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <div id="popupProfileClose" onclick="togglePopUpProfile()" class="popup-profile-close"></div>
        <div id="popupProfile" class="popup-profile p-5">
            <div class="img-container">
                <img src="profil/<?= $data['profil_picture'] ?>" class="img-fluid " alt="">
            </div>
            <h5 class="text-center text-white mt-2"><?= $data['username'] ?></h5>
            <p class="text-center mt-2"><?= $data['tentang'] ?></>
        </div>
        <div class="row">
            <div class="col-md-3 vertikal-teks-container">
            </div>
            <div class="col-md-6 deskripsi-container">
                <h1 class="mb-0"><?php echo $data['title'] ?></h1>
                <h5 class="username-text fw-light" onclick="togglePopUpProfile()"><?= $data['username'] ?></h5>
                <div class="d-flex align-items-center gap-2">
                    <div class="rating-container">
                        <!-- mencari rata-rata rating -->
                        <?php
                        if ($avgRating > 0) {
                            echo '<i class="fa-solid fa-star text-yellow"></i>';
                        } else {
                            echo '<i class="fa-regular fa-star text-yellow"></i>';
                        }
                        ?>
                        <p class="text-white m-0"><?= $avgRating ?></p>
                    </div>
                    <p class="mb-0">•</p>
                    <p class="mb-0"><?php echo timeToDate($data['uploaded_at']) ?></p>
                </div>

                <div class="text-center">
                    <img src="<?php echo $data['image_path'] ?>" class="img-fluid">
                </div>
                <p class="isian"><?php echo $data['description'] ?> </p>
                <div class="btn-koleksi">
                    <button class="btn"><a href="homepage.php">KOLEKSI</a></button>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-6 mx-auto mt-5 px-4 pt-3 pb-4 container-rating">
            <div class="d-flex flex-column gap-3 align-items-center justify-content-between px-5">
                <!-- Rating Form -->
                <!-- <div class="d-flex align-items-center gap-1">
                    <i class="fa-regular fa-star fs-4 star text-yellow"></i>
                    <i class="fa-regular fa-star fs-4 star text-yellow"></i>
                    <i class="fa-regular fa-star fs-4 star text-yellow"></i>
                    <i class="fa-regular fa-star fs-4 star text-yellow"></i>
                    <i class="fa-regular fa-star fs-4 star text-yellow"></i>
                </div> -->
                <?php
                if ($ratingExists) {
                    echo '<p class="mb-0">Penilaian Anda</p>';
                } else {
                    echo '<p class="mb-0">Berikan penilaian Anda</p>';
                }
                ?>
                <div class="d-flex align-items-center gap-1">
                    <?php
                    // Loop untuk menampilkan bintang
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $ratingValue) {
                            echo '<i class="fa-solid fa-star fs-4 star text-yellow"></i>';
                        } else {
                            echo '<i class="fa-regular fa-star fs-4 star text-yellow"></i>';
                        }
                    }
                    ?>
                </div>
                <?php if (!$ratingExists) : ?>
                    <form action="" method="post">
                        <input hidden type="text" id="uploads_id" name="uploads_id" value="<?= $data['id'] ?>">
                        <input hidden type="text" id="newuser_id" name="newuser_id" value="<?= $_SESSION['id'] ?>">
                        <input hidden type="text" id="rating" name="rating" value="">
                        <div class="btn-koleksi">
                            <button type="submit" name="submit" class="btn">Kirim</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
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

    <script>
        const popup = document.getElementById("PopUpId");

        function togglePopUp() {
            popup.classList.toggle("openPopUp")
        }
        //popup didalam lukisan
        const popupProfile = document.getElementById("popupProfile");
        const popupProfileClose = document.getElementById("popupProfileClose");

        function togglePopUpProfile() {
            popupProfile.classList.toggle("show")
            popupProfileClose.classList.toggle("show")
        }
    </script>
    <!-- rating -->
    <?php if (!$ratingExists) : ?>
        <script>
            document.querySelectorAll('.star').forEach(function(star, index, stars) {
                let clickedIndex = -1;
                const ratingInput = document.getElementById('rating');

                star.style.cursor = 'pointer';
                star.addEventListener('mouseover', function() {
                    for (let i = 0; i <= index; i++) {
                        stars[i].classList.remove('fa-regular');
                        stars[i].classList.add('fa-solid');
                    }
                });

                star.addEventListener('mouseout', function() {
                    if (clickedIndex === -1) {
                        for (let i = 0; i < stars.length; i++) {
                            stars[i].classList.remove('fa-solid');
                            stars[i].classList.add('fa-regular');
                        }
                    } else {
                        for (let i = 0; i <= clickedIndex; i++) {
                            stars[i].classList.remove('fa-regular');
                            stars[i].classList.add('fa-solid');
                        }
                        for (let i = clickedIndex + 1; i < stars.length; i++) {
                            stars[i].classList.remove('fa-solid');
                            stars[i].classList.add('fa-regular');
                        }
                    }
                });

                star.addEventListener('click', function() {
                    clickedIndex = index;
                    for (let i = 0; i <= clickedIndex; i++) {
                        stars[i].classList.remove('fa-regular');
                        stars[i].classList.add('fa-solid');
                    }
                    for (let i = clickedIndex + 1; i < stars.length; i++) {
                        stars[i].classList.remove('fa-solid');
                        stars[i].classList.add('fa-regular');
                    }
                    ratingInput.value = clickedIndex + 1;
                });
            });
        </script>
    <?php endif; ?>

</body>

</html>