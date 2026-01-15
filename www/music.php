<?php
session_start();

include 'database.php';

// Fetch all albums
$sql = "SELECT * FROM Album";
$result = mysqli_query($conn, $sql);
$albums = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style-music.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">
    <?php include 'nav.php'; ?>

    <div class="container-music max-w-7xl mx-auto px-6 py-12 space-y-10 bg-white/5 border border-white/10 rounded-3xl shadow-2xl backdrop-blur">
        <h1 class="text-4xl font-bold text-white">Music Page</h1>
        <p class="text-lg text-white/70">Welcome to the music page!</p>

        <form method="GET" action="" class="flex flex-wrap items-center gap-4 bg-white/10 border border-white/10 backdrop-blur rounded-xl shadow px-6 py-4">
            <input type="text" name="search" placeholder="zoeken" class="w-full md:flex-1 rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" />
            <button type="submit" class="inline-flex items-center justify-center px-6 py-2 bg-white text-emerald-700 font-semibold rounded-md shadow hover:bg-slate-100 transition">Search</button>
        </form>

        <table class="min-w-full border border-white/10 rounded-xl overflow-hidden shadow bg-white/5">
            <tr class="bg-white/10 text-left text-xs font-semibold uppercase tracking-wider text-white/70">
                <th class="px-4 py-3">Title</th>
                <th class="px-4 py-3">Artist</th>
                <th class="px-4 py-3">Genre</th>
                <th class="px-4 py-3">Release Year</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Tracks</th>
                <th class="px-4 py-3">Image</th>
                <th class="px-4 py-3">Added At</th>
                <th class="px-4 py-3">Actions</th>
            </tr>

            <?php foreach($albums as $album): ?>
            <tr class="border-t border-white/10 hover:bg-white/10 transition">
                <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['title']; ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['artist']; ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['genre']; ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['release_year']; ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php echo "$" . $album['price']; ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['tracks']; ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['image']; ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php echo $album['added_at']; ?></td>
                <td class="px-4 py-3 text-sm font-semibold text-emerald-300">
                    <a href="detail-music.php?id=<?php echo $album['id']; ?>" class="hover:underline">details</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
