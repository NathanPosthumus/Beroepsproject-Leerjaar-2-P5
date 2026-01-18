<?php
session_start();

include 'database.php';

$result = mysqli_query($conn, "SELECT * FROM Album");
$albums = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Music</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h1>Music Page</h1>
<p>Welcome to the music page!</p>

<form method="GET" action="">
    <input type="text" name="search" placeholder="zoeken">
    <button type="submit">Search</button>
</form>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Artist</th>
        <th>Genre</th>
        <th>Release Year</th>
        <th>Price</th>
        <th>Tracks</th>
        <th>Image</th>
        <th>Added At</th>
        <th>Actions</th>
    </tr>

    <?php foreach($albums as $album): ?>
    <tr>
        <td><?php echo $album['title']; ?></td>
        <td><?php echo $album['artist']; ?></td>
        <td><?php echo $album['genre']; ?></td>
        <td><?php echo $album['release_year']; ?></td>
        <td><?php echo $album['price']; ?></td>
        <td><?php echo $album['tracks']; ?></td>
        <td><?php echo $album['image']; ?></td>
        <td><?php echo $album['added_at']; ?></td>
        <td>
            <a href="detail-music.php?id=<?php echo $album['id']; ?>">details</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
