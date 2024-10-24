<?php
require "koneksi.php";

$sql = "SELECT * FROM WHERE";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery Art</title>
    <link rel="stylesheet" href="isiprofil.css">
</head>
<body>
    <div class="container">
        <div class="art-card">
            <div class="art-info">
                <h3 id="artist-name" onclick="showArtistInfo()">Nama Pelukis</h3>
                <div class="art-image"></div>
                <p class="art-description">
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..."
                </p>
            </div>
        </div>
    </div>

    <div id="artist-popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <img id="artist-profile-pic" src="artist-profile.jpg" alt="Artist Profile Picture">
            <h2 id="artist-username">Username</h2>
            <p id="artist-bio">About the artist...</p>
        </div>
    </div>

    <script>
        function showArtistInfo() {
    // Set the artist info (this would be dynamic in a real application)
    document.getElementById('artist-username').innerText = 'Nama Pelukis';
    document.getElementById('artist-profile-pic').src = 'artist-profile.jpg';
    document.getElementById('artist-bio').innerText = 'This is a brief biography about the artist.';

    // Show the popup
    document.getElementById('artist-popup').style.display = 'block';
    }

    function closePopup() {
    document.getElementById('artist-popup').style.display = 'none';
    }
    </script>
</body>
</html>
