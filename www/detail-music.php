<?php

session_start();

// if(!isset($_SESSION['role'])) {
//     header("location: login.php");
//     exit;
// }

include 'database.php';

$music_id = $_GET['id'];

$sql = "SELECT * FROM Album WHERE id = $music_id";
$result = mysqli_query($conn, $sql);
$album = mysqli_fetch_assoc($result);

if(!$album) {
    echo "Album not found.";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Details</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style-music.css">
    <link rel="stylesheet" href="admin-dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-dashboard">
        <h1 class="dashboard-title">Music Details</h1>
        <br>
        <table>
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

    </div>
</body>
</html>