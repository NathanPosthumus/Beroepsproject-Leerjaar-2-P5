<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'worker') {
    header("location: login.php");
    exit;
}

require 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Project 7 - Pets - De Vrolijke Viervoeter</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h2>Product maken</h2>

<form action="add_album_process.php" method="POST">

    <p>
        <label>Title</label><br>
        <input type="text" name="title">
    </p>

    <p>
        <label>Artist</label><br>
        <input type="text" name="artist">
    </p>

    <p>
        <label>Description</label><br>
        <input type="text" name="description">
    </p>

    <p>
        <label>Genre</label><br>
        <input type="text" name="genre">
    </p>

    <p>
        <label>Release year</label><br>
        <input type="number" name="release_year">
    </p>

    <p>
        <label>Price</label><br>
        <input type="text" name="price">
    </p>

    <p>
        <label>Tracks</label><br>
        <input type="number" name="tracks">
    </p>

    <p>
        <label>Image</label><br>
        <input type="text" name="image">
    </p>

    <p>
        <label>Added at</label><br>
        <input type="datetime-local" name="added_at">
    </p>

    <button type="submit">Add album</button>

</form>

</body>
</html>
