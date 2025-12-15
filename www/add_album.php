<?php 

session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'worker') {
    header("location: login.php");
    exit;
}
require 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="admin-dashboard.css">
</head>
<body>

<?php include 'nav.php'; ?>

    <div class="container">
    <h2>Product maken</h2>
    <form action="add_album_process.php" method="POST">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Bijv. Midnight Echoes" >
        </div>

        <div class="form-group">
            <label for="artist">Artist</label>
            <input type="text" name="artist" id="artist" placeholder="Bijv. Luna Rivers" >
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Album description" >
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" placeholder="Bijv. Indie" >
        </div>

        <div class="form-group">
            <label for="release_year">Release Year</label>
            <input type="number" name="release_year" id="release_year" placeholder="Bijv. 2021" >
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" placeholder="Bijv. 12.99" >
        </div>

        <div class="form-group">
            <label for="tracks">Tracks</label>
            <input type="number" name="tracks" id="tracks" placeholder="Bijv. 10" >
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" id="image" placeholder="Bijv. midnight_echoes.jpg" >
        </div>

        <div class="form-group">
            <label for="added_at">Added At</label>
            <input type="datetime-local" name="added_at" id="added_at" >
        </div>

        <button type="submit" class="btn">Add album</button>

    </form>
</div>

</div>

   

    <!-- method is post bij forms -->
    <!--  als je op de label klikt, gaat die naar het input veld met dat id -->

    <!-- name bepaald de sleutel in de database waar de waarde in komt te staan -->
    
    
</body>
</html>
