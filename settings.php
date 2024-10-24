<?php
session_start();
require_once "koneksi.php";
$id = $_SESSION['id'];
$sql = "SELECT * FROM newuser WHERE user_id = '$id' ";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETTINGS</title>
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
    <link rel="stylesheet" href="assets/setting.css">
    <style>
        .profile-container {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .edit-icon {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <div class="wrapper">
            <nav>
                <div class="logo"><a href="homepage.php"><img src="assets/Logo atas.svg" alt="Logo"></div></a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 settings-container">
                <form class="input-container" action="upload_profil.php?id=<?php echo $data['user_id'] ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="profil-username">
                        <div class="profile-container">
                            <div class="profile">
                                <img src="profil/<?php echo $data['profil_picture'] ?>" alt="Foto Profil"
                                    id="profile-picture">
                            </div>
                            <div class="user-info">
                                <span class="user-name" id="userName"><?php echo $data['username'] ?></span>
                                <input type="text" id="nameInput" name="username" class="name-input"
                                    value="<?php echo $data['username'] ?>" style="display: none;">
                                <span class="edit-icon" id="editIcon">&#9998;</span>
                            </div>
                            <!-- <button type="button" class="btn btn-primary" id="ubahFoto" data-bs-toggle="modal" data-bs-target="#profilePictureModal">Ubah Foto</button> -->
                            <button type="button" class="btn btn-primary" id="ubahFotoButton">Ubah Foto</button>
                            <input type="file" name="foto" id="foto" class="file-input btn btn-primary">
                        </div>
                    </div>
                    <label for="fullNameInput">Nama Depan</label>
                    <input type="text" id="firstNameInput" name="nama-depan" placeholder="Masukkan nama lengkap anda."
                        value="<?php echo $data['fname'] ?>">
                    <br>
                    <label for="fullNameInput">Nama Belakang</label>
                    <input type="text" id="lastNameInput" name="nama-belakang" placeholder="Masukkan nama lengkap anda."
                        value="<?php echo $data['lname'] ?>">
                    <br>
                    <!-- <label for="birthDateInput">Tanggal Lahir</label>
                    <input type="text" id="birthDateInput" name="tanggal-lahir"
                        placeholder="Masukkan tanggal, bulan dan tahun lahir anda."
                        value="<?php echo $data['tgl_lahir'] ?>"> -->
                    <br>
                    <label for="aboutInput">Tentang</label>
                    <input type="text" id="aboutInput" name="tentang" placeholder="Jelaskan tentang diri anda. "
                        value="<?php echo $data['tentang'] ?>">
                    <div class="tombol">
                        <div class="btn-simpan">
                        <a href="data-berhasil-disimpan2.php"><input type="submit" name="submit" value="SIMPAN PERUBAHAN" class="btn">
                        </div></a>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </main>

    <div class="footer-section">
        <footer class="kaki">
            <img src="assets/logo bawah.png" alt="Logo">
            <div class="tentang">
                <h4>Tentang Kami</h4>
                <p>Platform yang berisi berbagai karya seni dari berbagai aliran.</p>
            </div>
            <div class="social">
                <h4>Ikuti Kami</h4>
                <div class="sosmed">
                    <a href="https://www.instagram.com/"><img src="assets/Instagram.svg" alt="Instagram"></a>
                    <a href="https://mail.google.com/"><img src="assets/Gmail Logo.svg" alt="Gmail"></a>
                    <a href="https://api.whatsapp.com/"><img src="assets/WhatsApp.svg" alt="WhatsApp"></a>
                </div>
            </div>
        </footer>
        <div class="col-12 py-4 copyright">
            &copy; GalArt 2024
        </div>
    </div>

    <!-- Modal untuk mengubah foto profil -->
    <div class="modal fade" id="profilePictureModal" tabindex="-1" aria-labelledby="profilePictureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profilePictureModalLabel">Ubah Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="file" id="profile-picture-input-modal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="changeProfilePicture()">Simpan
                        Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        document.getElementById('ubahFotoButton').addEventListener('click', function () {
            document.getElementById('foto').click();
        })

        function changeProfilePicture() {
            var input = document.getElementById('profile-picture-input-modal');
            var file = input.files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                var img = document.getElementById('profile-picture');
                img.src = reader.result;
                document.getElementById('profilePictureModal').modal('hide');
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                alert("Gagal memuat file");
            }
        }

        document.getElementById('editIcon').addEventListener('click', function () {
            var nameSpan = document.getElementById('userName');
            var nameInput = document.getElementById('nameInput');

            if (nameSpan.style.display !== 'none') {
                nameSpan.style.display = 'none';
                nameInput.style.display = 'inline';
                nameInput.focus();
                nameInput.select();
            } else {
                nameSpan.style.display = 'inline';
                nameInput.style.display = 'none';
                nameSpan.textContent = nameInput.value;
            }
        });

        document.getElementById('nameInput').addEventListener('blur', function () {
            var nameSpan = document.getElementById('userName');
            var nameInput = document.getElementById('nameInput');

            nameSpan.style.display = 'inline';
            nameInput.style.display = 'none';
            nameSpan.textContent = nameInput.value;
        });
    </script>
</body>

</html>