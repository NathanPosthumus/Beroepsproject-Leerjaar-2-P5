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
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Details</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style-music.css">
    <link rel="stylesheet" href="admin-dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">
    <?php include 'nav.php'; ?>
    <div class="container-dashboard max-w-4xl mx-auto px-6 py-12 bg-white/10 border border-white/10 rounded-2xl shadow-xl backdrop-blur">
        <h1 class="dashboard-title text-4xl font-bold text-white">Music Details</h1>
        <br>
        <table class="min-w-full border border-white/10 rounded-xl overflow-hidden shadow bg-white/5">
    <tr class="bg-white/10 text-left text-xs font-semibold uppercase tracking-wider text-white/70">
        <th class="px-4 py-3">Title</th>
        <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['title']; ?></td>
    </tr>
    <tr class="border-t border-white/10">
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/70">Artist</th>
        <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['artist']; ?></td>
    </tr>
    <tr class="border-t border-white/10">
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/70">Genre</th>
        <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['genre']; ?></td>
    </tr>
    <tr class="border-t border-white/10">
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/70">Release Year</th>
        <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['release_year']; ?></td>
    </tr>
    <tr class="border-t border-white/10">
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/70">Price</th>
        <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['price']; ?></td>
    </tr>
    <tr class="border-t border-white/10">
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/70">Tracks</th>
        <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['tracks']; ?></td>
    </tr>
    <tr class="border-t border-white/10">
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/70">Image</th>
        <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['image']; ?></td>
    </tr>
    <tr class="border-t border-white/10">
        <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/70">Added At</th>
        <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['added_at']; ?></td>
    </tr>
</table>

    </div>
</body>
</html>