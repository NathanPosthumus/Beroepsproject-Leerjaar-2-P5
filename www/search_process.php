<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="search.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">
    <?php

    include 'nav.php';
    ?>

    <div class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <?php
//validatie
if(isset($_GET['zoekterm']) && trim($_GET['zoekterm']) !== ''){
    
    $zoekterm = trim($_GET['zoekterm']);

    require 'database.php';
    $zoektermEscaped = mysqli_real_escape_string($conn, $zoekterm);
    $sql = "SELECT * FROM Album WHERE title LIKE '$zoektermEscaped%'";
    $result = mysqli_query($conn, $sql);
    $albums = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo '<h1 class="text-3xl font-bold text-white">Zoekresultaten</h1>';

    if (!empty($albums)) {
        echo '<div class="space-y-4">';
        foreach($albums as $album){
            echo '<div class="bg-white/10 border border-white/10 rounded-xl shadow px-6 py-5 space-y-1">';
            echo '<p class="text-xl font-semibold text-white">' . htmlspecialchars($album['title']) . '</p>';
            echo '<p class="text-sm text-white/70">' . htmlspecialchars($album['artist']) . '</p>';
            echo '<p class="text-sm text-white/70">' . htmlspecialchars($album['description']) . '</p>';
            echo '<div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-white/80">';
            echo '<span><strong>Genre:</strong> ' . htmlspecialchars($album['genre']) . '</span>';
            echo '<span><strong>Jaar:</strong> ' . htmlspecialchars($album['release_year']) . '</span>';
            echo '<span><strong>Prijs:</strong> ' . htmlspecialchars($album['price']) . '</span>';
            echo '<span><strong>Tracks:</strong> ' . htmlspecialchars($album['tracks']) . '</span>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p class="text-white/70">Geen resultaten gevonden voor <span class="font-semibold text-white">' . htmlspecialchars($zoekterm) . '</span>.</p>';
    }
   
}
else{
    echo '<p class="text-white/70">Voer een zoekterm in.</p>';
}
?>
    </div>
</body>
</html>

