<?php

require 'database.php';

if (!isset($_POST['title'])) {
    die("Form not submitted");
}

$title = $_POST['title'];
$artist = $_POST['artist'];
$description = $_POST['description'];
$genre = $_POST['genre'];
$release_year = $_POST['release_year'];
$price = $_POST['price'];
$tracks = $_POST['tracks'];
$image = $_POST['image'];
$added_at = $_POST['added_at'];

$sql = "INSERT INTO Album (title, artist, description, genre, release_year, price, tracks, image, added_at)
        VALUES ('$title', '$artist', '$description', '$genre', '$release_year', '$price', '$tracks', '$image', '$added_at')";

if (mysqli_query($conn, $sql)) {
    header("Location: music.php");
    exit();
} else {
    echo "Database error";
}

?>
