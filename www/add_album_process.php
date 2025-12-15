<?php 

// haal je op uit de form met de name attribuut
// nu sla je eigenlijk alles op in vars (alles van de form sla je op in een var)

// basic validation

/// check of alles is ingevuld
if(
    !isset(
        $_POST['title'],
        $_POST['artist'],
        $_POST['description'],
        $_POST['genre'],
        $_POST['release_year'],
        $_POST['price'],
        $_POST['tracks'],
        $_POST['image'],
        $_POST['added_at']
    )
) {
    die("Form data not submitted properly.");
}

// check of niks leeg is
if(
    empty($_POST['title']) ||
    empty($_POST['artist']) ||
    empty($_POST['description']) ||
    empty($_POST['genre']) ||
    empty($_POST['release_year']) ||
    empty($_POST['price']) ||
    empty($_POST['tracks']) ||
    empty($_POST['image']) ||
    empty($_POST['added_at'])
) {
    die("Please fill in all required fields.");
}

// strlen + validatie controleren
if(
    strlen($_POST['title']) > 255 ||
    strlen($_POST['artist']) > 255 ||
    !is_numeric($_POST['release_year']) ||
    !is_numeric($_POST['price']) ||
    !is_numeric($_POST['tracks']) 
) {
    die("Info die gegeven is is te lang of onjuist.");
}

// waardes opslaan
$title = $_POST['title'];
$artist = $_POST['artist'];
$description = $_POST['description'];
$genre = $_POST['genre'];
$release_year = $_POST['release_year'];
$price = $_POST['price'];
$tracks = $_POST['tracks'];
$image = $_POST['image'];
$added_at = $_POST['added_at'];

require 'database.php';

$sql = "INSERT INTO Album (title, artist, description, genre, release_year, price, tracks, image, added_at) 
        VALUES ('$title', '$artist', '$description', '$genre', '$release_year', '$price', '$tracks', '$image', '$added_at')";

if(mysqli_query($conn, $sql)){
    header("Location: music.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
