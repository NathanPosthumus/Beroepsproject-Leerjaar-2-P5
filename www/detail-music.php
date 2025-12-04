<?php

session_start();

if(!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}

include 'database.php';

$music_id = $_GET['id'];

$sql = "SELECT * FROM music WHERE id = $music_id";
$result = mysqli_query($conn, $sql);
$track = mysqli_fetch_assoc($result);

if(!$track) {
    echo "Track not found.";
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
                <th>Song Name</th>
                <td><?php echo ($track['song_name']); ?></td>
            </tr>
            <tr>
                <th>Release Date</th>
                <td><?php echo ($track['release_date']); ?></td>
            </tr>
            <tr>
                <th>Genre</th>
                <td><?php echo ($track['genre']); ?></td>
            </tr>
            <tr>
                <th>Singer</th>
                <td><?php echo ($track['singer']); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>