-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2024 pada 15.01
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'klasik'),
(2, 'modern');

-- --------------------------------------------------------

--
-- Struktur dari tabel `newuser`
--

CREATE TABLE `newuser` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tentang` varchar(255) DEFAULT NULL,
  `profil_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `newuser`
--

INSERT INTO `newuser` (`user_id`, `username`, `fname`, `lname`, `email`, `password`, `tentang`, `profil_picture`) VALUES
(7, 'Celyn', 'Celynnia', 'Dinantra', 'apalagi@gmail.com', '$2y$10$Ra4tL0w8cmPZM0/wNhGmQ.MDq8JQb.y2ds2k8qDhkrTVM5t3p2ieW', 'Pecinta seni.', 'IMG-666954bbadf3e7.12401251.jpg'),
(8, 'anjelitahp', 'Anjelita', 'Hermulia', 'anjelitahermulia@gmail.com', '$2y$10$2IGZinRsyke81CduLVjmae8O8Ze5hkhpLv44K8hNwh3lTXtQF.EnG', '', 'IMG-666929f589fbf9.02124904.png'),
(11, 'riaaa', 'Ria', 'Pebrian', 'riapebriandini98109@gmail.com', '$2y$10$Nul20EoSY9hOQ50GbFkSp.yo924QMkFUiU6NK96l2YdI6v5QgWTB6', 'Seniman pemula yamg sangat tertarik dengan seni klasik, mudah mudahan nnti jadi seniman yang terkenal aamiin', 'IMG-666c2b8a92f372.03508721.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `uploads_id` int(11) DEFAULT NULL,
  `newuser_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL,
  `rating` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `title`, `description`, `contact`, `image_path`, `uploaded_at`, `category_id`, `rating`) VALUES
(12, 7, 'Perempuan Spanyol', 'Lukisan ini merupakan karya dari Basuki Abdullah, seorang pelukis terkenal Indonesia, yang menggambarkan seorang perempuan Spanyol dengan elegansi dan keanggunan khas budaya Spanyol. Dalam lukisan ini, perempuan tersebut mengenakan pakaian tradisional dengan gaun hitam elegan yang menonjolkan bahunya yang terbuka. Gaun tersebut dilengkapi dengan sarung tangan panjang berwarna hitam yang memberikan kesan aristokratik.\r\n\r\nPerempuan ini juga mengenakan mantilla, sejenis penutup kepala renda hitam yang menjuntai hingga bahunya, menambah nuansa tradisional yang kuat. Di tangan kanannya, ia memegang kipas yang terbuka, yang merupakan aksesori penting dalam budaya Spanyol dan sering digunakan dalam tarian Flamenco.\r\n\r\nRias wajahnya menampilkan bibir merah yang kontras dengan kulitnya yang halus, menambahkan kesan dramatis pada penampilannya. Anting panjang yang menjuntai memberikan sentuhan kilau pada keseluruhan penampilannya. Di dadanya, terdapat mawar merah yang menambahkan sedikit warna pada komposisi yang didominasi oleh warna hitam dan netral.\r\n\r\nLatar belakang lukisan ini sederhana, dengan gradasi warna gelap yang membuat fokus tetap pada figur utama. Basuki Abdullah berhasil menangkap keanggunan dan keindahan perempuan Spanyol ini dengan detail yang menawan dan ekspresi yang penuh percaya diri.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '+62 83195617806', 'uploads/spanyol.jpg', '2024-06-08 00:59:42', 1, 0),
(13, 7, 'Sakura Putih', 'Lukisan ini menggambarkan bunga sakura putih dengan gaya impresionis yang menawan. Bunga-bunga sakura terlihat mekar dengan kelopak-kelopak putih yang lembut, menciptakan suasana yang tenang dan elegan. Setiap kelopak bunga digambarkan dengan sapuan kuas tebal, memberikan tekstur dan kedalaman pada lukisan.\r\n\r\nLatar belakang lukisan menggunakan palet warna netral seperti cokelat muda dan krem, yang membuat bunga sakura putih tampak lebih menonjol dan menambah kesan alami pada keseluruhan komposisi. Warna latar belakang yang lembut dan hangat berpadu harmonis dengan warna bunga, menciptakan kontras yang halus namun efektif.\r\n\r\nDetail pada tengah bunga sakura ditonjolkan dengan sedikit sentuhan warna cokelat dan kuning, menambah dimensi dan realisme pada lukisan. Sapuan kuas yang ekspresif dan penggunaan warna yang bijak menciptakan ilusi gerakan, seolah-olah bunga-bunga tersebut sedang tertiup angin.\r\n\r\nLukisan ini memberikan perasaan damai dan keindahan alami, menggambarkan momen singkat namun berharga saat bunga sakura mekar penuh. Ini adalah representasi yang indah dan penuh makna dari keindahan bunga sakura putih dalam gaya impresionis yang halus dan memukau.', '+62 8339678120', 'uploads/ellie.jpeg', '2024-06-08 01:02:54', 2, 0),
(14, 7, 'Pengamen Istirahat', 'Lukisan ini merupakan karya dari Djoko Pekik yang berjudul \"Pengamen Istirahat\". Dalam lukisan ini, Djoko Pekik menggambarkan sekelompok pengamen yang sedang beristirahat setelah menjalankan aktivitas mereka.\r\n\r\nGaya lukisan ini menonjol dengan penggunaan warna-warna cerah dan kontras yang kuat, serta teknik sapuan kuas yang ekspresif dan dinamis. Pengamen dalam lukisan ini terlihat memakai pakaian tradisional yang berwarna merah dan hijau, dengan beberapa di antaranya memakai topeng khas yang mencerminkan seni tradisional Indonesia.\r\n\r\nKomposisi lukisan ini menunjukkan pengamen dalam berbagai posisi istirahat. Di latar depan, seorang pengamen terlihat duduk bersandar dengan posisi santai, sementara di tengah, dua pengamen lainnya tampak berinteraksi dengan lebih dekat. Satu pengamen terlihat berbaring dengan kepala di pangkuan temannya, menciptakan suasana keakraban dan kebersamaan di antara mereka. Di latar belakang, ada pengamen lain yang berbaring telentang, menambah kesan lelah dan relaksasi setelah beraktivitas.\r\n\r\nLatar belakang lukisan ini menunjukkan elemen-elemen sederhana yang mengindikasikan lingkungan yang mungkin merupakan tempat berkumpul atau beristirahat, dengan tiang dan objek-objek lainnya yang tidak terlalu mencolok namun menambah kedalaman pada komposisi keseluruhan.\r\n\r\nDjoko Pekik berhasil menangkap esensi kehidupan pengamen dengan menonjolkan sisi humanis mereka. Melalui penggunaan warna, komposisi, dan ekspresi wajah serta tubuh, lukisan ini memberikan pandangan yang intim dan penuh empati terhadap kehidupan sehari-hari para pengamen. Lukisan ini tidak hanya menampilkan momen istirahat, tetapi juga menyampaikan rasa kebersamaan dan solidaritas di antara mereka.', '+62 8967509432', 'uploads/Djoko Pekik, Pengamen Istirahat.jpg', '2024-06-08 01:04:42', 1, 0),
(15, 7, 'Perempuan Tutup Mata', 'Lukisan ini menampilkan seorang perempuan dengan mata tertutup, menciptakan suasana yang tenang dan penuh misteri. Gaya lukisan ini menekankan kehalusan dan keindahan dengan fokus pada wajah dan ekspresi sang perempuan.\r\n\r\nPerempuan dalam lukisan ini memiliki rambut yang tertata rapi, menambah kesan elegan dan anggun. Mata tertutupnya memberikan kesan kontemplatif, seolah-olah ia sedang tenggelam dalam pikiran atau menikmati momen kedamaian.\r\n\r\nPalet warna yang digunakan dalam lukisan ini cenderung lembut dan menenangkan, dengan dominasi warna netral yang memperkuat suasana damai dan introspektif. Kulitnya digambarkan dengan detail halus, menunjukkan teknik melukis yang teliti dan keterampilan tinggi dari sang pelukis.', '+62 8128769701', 'uploads/perempuan tutup mata.jpeg', '2024-06-08 01:08:23', 2, 0),
(16, 7, 'Dua Wajah', 'Lukisan ini menggambarkan dua wajah manusia yang saling berdekatan, dengan ekspresi yang tenang dan pandangan mata yang langsung menghadap ke penonton. Wajah-wajah tersebut memiliki fitur yang mirip, dengan mata besar, hidung yang lurus, dan bibir yang tebal. Gaya lukisan ini mengingatkan pada seni modern, dengan penggunaan warna-warna yang cerah dan kontras, seperti biru, merah, dan putih.\r\n\r\nKedua kepala ini tampak saling bertumpukan, menciptakan kesan keterikatan yang erat antara dua individu tersebut. Latar belakangnya didominasi oleh warna biru yang mengesankan kedalaman dan ketenangan, sedangkan bagian bawah lukisan menunjukkan warna merah yang memberikan kontras dan menambah elemen dramatis pada keseluruhan komposisi.\r\n\r\nTekstur lukisan ini tampak kasar, menunjukkan penggunaan teknik sapuan kuas yang kuat dan tebal, memberikan dimensi dan kedalaman pada gambar. Secara keseluruhan, lukisan ini menyiratkan pesan tentang hubungan dan koneksi emosional antara dua orang, dengan penggunaan elemen visual yang ekspresif dan dinamis.', '+62 85987650987', 'uploads/mukadua.jpg', '2024-06-09 23:22:47', 2, 0),
(17, 7, 'The Scream', 'Lukisan ini adalah \"The Scream\" yang terkenal karya Edvard Munch. Lukisan ini menampilkan sosok manusia dengan ekspresi wajah yang penuh ketakutan atau kecemasan. Sosok tersebut berdiri di atas jembatan, dengan kedua tangan memegang sisi kepala, mulut terbuka lebar seolah-olah berteriak, dan mata yang tampak melotot.\r\n\r\nDi latar belakang, langit berwarna oranye terang dengan garis-garis bergelombang yang menciptakan suasana dramatis dan menggugah perasaan tidak nyaman. Warna langit yang mencolok ini kontras dengan warna gelap pada air dan lanskap di sekitarnya, memperkuat kesan ketidakstabilan emosional.\r\n\r\nDua sosok manusia lainnya terlihat di kejauhan di sebelah kiri, tampak tidak menyadari atau tidak peduli dengan keadaan sosok utama. Elemen-elemen visual dalam lukisan ini, seperti garis-garis yang melengkung dan warna-warna yang mencolok, digunakan untuk mengekspresikan perasaan cemas, ketakutan, dan keterasingan.\r\n\r\nLukisan ini merupakan salah satu karya paling ikonik dalam seni ekspresionis, yang bertujuan untuk menggambarkan emosi dan kondisi psikologis manusia dengan cara yang sangat langsung dan intens.', '+2 87659764', 'uploads/orang.jpg', '2024-06-09 23:26:10', 2, 0),
(18, 7, 'Pangeran Diponegoro', 'Lukisan karya Basuki abdulah berjudul “Diponegoro Memimpin Pertempuran” ini digarap pada tahun 1940. Lukisan ini berukuran 150 cm x120cm yang digarap menggunakan cat minyak pada kanvas. Pada lukisan ini menampilkan sosok pangeran Diponegoro dengan pakaian dan memakai sorban dengan warna putih kecoklatan serta memakai senjata keris sedang menunggangi kuda berwarna hitam. Pada lukisan ini Pangeraan Diponegoro sedang menunggangi kuda yang berlari kencang dengan nenunjukkan jari tangan kanannya kearah samping dan tangan kirinya memegang tali pada kuda dengan tatapan mata yang tajam. Pada backgrounddigambarkan seperti kobaran api yang membara dengan goresan – goresan yang ekspresif dengan warna merah, jingga, kuning, coklat , putih dan hitam. ', '+62 78975790', 'uploads/diponegoro.jpg', '2024-06-09 23:29:25', 1, 0),
(20, 7, 'Penangkapan Pangeran Diponegoro', 'Satu lukisan Raden Saleh yang mendadak booming, berjudul Penangkapan Pangeran Diponegoro. Berbeda dengan dua lukisan sebelumnya yang bertema hewan, lukisan Raden Saleh satu ini menggambarkan peristiwa nyata dari cerita tanah jajahan.Menggambarkan bagaimana sosok Pangeran Diponegoro yang kuat tertangkap oleh siasat licik Pemerintah Hindia-Belanda. Beberapa menyatakan, lukisan ini menunjukkan sisi nasionalisme Raden Saleh yang lama menetap di Eropa. Meski demikian, gak sedikit juga yang meragukan keyakinan tersebut.\r\n\r\n\r\n.', '+62 87867592', 'uploads/penangkapan pangeran diponegoro.jpg', '2024-06-09 23:38:57', 1, 0),
(21, 7, 'Kota Pantai di Senja', 'Di sebuah sore yang tenang, matahari mulai tenggelam, memancarkan cahaya keemasan yang memantul di laut. Sebuah kota kecil yang tenang terletak di tepi pantai, dengan bangunan-bangunan putih yang berjajar rapi. Pegunungan menjulang di belakang kota, disinari cahaya senja yang hangat.\r\n\r\nLangit biru cerah dengan beberapa awan kecil melengkapi keindahan pemandangan ini. Di tepi laut, air tenang dan hanya sedikit beriak. Beberapa perahu kecil berlayar perlahan, menambah suasana damai.\r\n\r\nDi bagian depan, vegetasi hijau memberikan kontras yang indah dengan laut dan langit biru. Pohon-pohon kecil dan semak-semak tumbuh subur, menambah kesan alami.\r\n\r\nKota kecil ini tampak seperti tempat yang jauh dari kesibukan dunia, menawarkan ketenangan dan keindahan alam yang mempesona. Melalui lukisan ini, kita diajak merasakan kedamaian di tepi laut saat matahari terbenam.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'chairish.com', 'uploads/oil painting.jpg', '2024-06-11 09:10:33', 2, 0),
(22, 7, 'tes', 'tes aja', 'tes', 'uploads/river.jpg', '2024-06-12 09:28:48', 2, 0),
(23, 7, 'Lilin', 'Lilin yang indah', '@riaaa', 'uploads/candles.jpg', '2024-06-12 10:26:53', 1, 0),
(25, 11, 'Batik Yuu', 'nsiugciuabxjk', '76644', 'uploads/ngebatik.jpg', '2024-06-14 12:03:26', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `newuser`
--
ALTER TABLE `newuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_id` (`uploads_id`),
  ADD KEY `newuser_id` (`newuser_id`);

--
-- Indeks untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `newuser`
--
ALTER TABLE `newuser`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`uploads_id`) REFERENCES `uploads` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`newuser_id`) REFERENCES `newuser` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `newuser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
