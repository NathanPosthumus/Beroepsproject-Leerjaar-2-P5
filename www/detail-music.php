<?php
session_start();

include 'database.php';

$music_id = $_GET['id'];

$sql = "SELECT * FROM Album WHERE id = $music_id";
$result = mysqli_query($conn, $sql);
$album = mysqli_fetch_assoc($result);

if (!$album) {
    echo "Album not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Music Details</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h1>Music Details</h1>

<table border="1">
    <tr>
        <th>Title</th>
        <td><?php echo $album['title']; ?></td>
    </tr>
    <tr>
        <th>Artist</th>
        <td><?php echo $album['artist']; ?></td>
    </tr>
    <tr>
        <th>Genre</th>
        <td><?php echo $album['genre']; ?></td>
    </tr>
    <tr>
        <th>Release Year</th>
        <td><?php echo $album['release_year']; ?></td>
    </tr>
    <tr>
        <th>Price</th>
        <td><?php echo $album['price']; ?></td>
    </tr>
    <tr>
        <th>Tracks</th>
        <td><?php echo $album['tracks']; ?></td>
    </tr>
    <tr>
        <th>Image</th>
        <td><?php echo $album['image']; ?></td>
    </tr>
    <tr>
        <th>Added At</th>
        <td><?php echo $album['added_at']; ?></td>
    </tr>
</table>

</body>
</html>
