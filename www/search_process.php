<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<div>
<?php
if (isset($_GET['zoekterm']) && trim($_GET['zoekterm']) !== '') {

    $zoekterm = trim($_GET['zoekterm']);

    include 'database.php';
    $sql = "SELECT * FROM Album WHERE title LIKE '$zoekterm%'";
    $result = mysqli_query($conn, $sql);
    $albums = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo "<h1>Zoekresultaten</h1>";

    if (!empty($albums)) {
        foreach ($albums as $album) {
            echo "<div>";
            echo "<p>Title: " . $album['title'] . "</p>";
            echo "<p>Artist: " . $album['artist'] . "</p>";
            echo "<p>Description: " . $album['description'] . "</p>";
            echo "<p>Genre: " . $album['genre'] . "</p>";
            echo "<p>Jaar: " . $album['release_year'] . "</p>";
            echo "<p>Prijs: " . $album['price'] . "</p>";
            echo "<p>Tracks: " . $album['tracks'] . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>Geen resultaten gevonden voor '" . $zoekterm . "'</p>";
    }

} else {
    echo "<p>Voer een zoekterm in.</p>";
}
?>
</div>

</body>
</html>
