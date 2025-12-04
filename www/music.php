<?php

session_start(); 

if(!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}

include 'database.php';

$sql = "SELECT * FROM music";
$result = mysqli_query($conn, $sql);
$music = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style-music.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container-music">
        <h1>Music Page</h1>
        <p>Welcome to the music page!</p>

        <table>
        <tr>
            <th>song_name</th>
            <th>release_date</th>
            <th>genre</th>
            <th>singer</th>
            <th>actions</th>
        </tr>
        <?php foreach($music as $track): ?>
        <tr>
            <td><?php echo $track['song_name']; ?></td>
            <td><?php echo $track['release_date']; ?></td>
            <td><?php echo $track['genre']; ?></td>
            <td><?php echo $track['singer']; ?></td>
            <td>
                <a href="detail-music.php?id=<?php echo $track['id']; ?>">details</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
    </div>
    
</body>
</html>