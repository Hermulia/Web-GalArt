<?php
include "koneksi.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate incoming data
    $ratings = $_POST['ratings'];
    $uploads_id = $_POST['uploads_id'];
    $newuser_id = $_POST['newuser_id'];

    // Validate if the user has already rated
    $check_ratings_sql = "SELECT * FROM ratings WHERE uploads_id = '$uploads_id' AND newuser_id = '$newuser_id'";
    $check_ratings_result = mysqli_query($conn, $check_rating_sql);

    if (mysqli_num_rows($check_ratings_result) > 0) {
        // User has already rated, update the rating
        $update_ratings_sql = "UPDATE ratings SET ratings = '$ratings' WHERE uploads_id = '$uploads_id' AND newuser_id = '$newuser_id'";
        $update_ratings_result = mysqli_query($conn, $update_ratings_sql);
        if ($update_ratings_result) {
            echo "Rating updated successfully!";
        } else {
            echo "Failed to update rating.";
        }
    } else {
        // Insert new rating
        $insert_ratings_sql = "INSERT INTO ratings (uploads_id, newuser_id, ratings) VALUES ('$uploads_id', '$newuser_id', '$ratings')";
        $insert_ratings_result = mysqli_query($conn, $insert_ratings_sql);
        if ($insert_ratings_result) {
            echo "Rating submitted successfully!";
        } else {
            echo "Failed to submit rating.";
        }
    }
} else {
    echo "Method not allowed";
}
?>
