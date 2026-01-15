<?php 

session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'worker') {
    header("location: login.php");
    exit;
}
require 'database.php';

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="admin-dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">

<?php include 'nav.php'; ?>

    <div class="container max-w-4xl mx-auto px-6 py-12 bg-white/5 border border-white/10 rounded-3xl shadow-2xl backdrop-blur">
    <h2 class="text-4xl font-bold text-white mb-8">Product maken</h2>
    <form action="add_album_process.php" method="POST" class="bg-white/10 border border-white/10 backdrop-blur rounded-xl shadow px-10 py-10 space-y-6">

        <div class="form-group flex flex-col gap-2">
            <label for="title" class="text-sm font-semibold text-white/80">Title</label>
            <input type="text" name="title" id="title" placeholder="Bijv. Midnight Echoes" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <div class="form-group flex flex-col gap-2">
            <label for="artist" class="text-sm font-semibold text-white/80">Artist</label>
            <input type="text" name="artist" id="artist" placeholder="Bijv. Luna Rivers" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <div class="form-group flex flex-col gap-2">
            <label for="description" class="text-sm font-semibold text-white/80">Description</label>
            <input type="text" name="description" id="description" placeholder="Album description" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <div class="form-group flex flex-col gap-2">
            <label for="genre" class="text-sm font-semibold text-white/80">Genre</label>
            <input type="text" name="genre" id="genre" placeholder="Bijv. Indie" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <div class="form-group flex flex-col gap-2">
            <label for="release_year" class="text-sm font-semibold text-white/80">Release Year</label>
            <input type="number" name="release_year" id="release_year" placeholder="Bijv. 2021" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <div class="form-group flex flex-col gap-2">
            <label for="price" class="text-sm font-semibold text-white/80">Price</label>
            <input type="text" name="price" id="price" placeholder="Bijv. 12.99" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <div class="form-group flex flex-col gap-2">
            <label for="tracks" class="text-sm font-semibold text-white/80">Tracks</label>
            <input type="number" name="tracks" id="tracks" placeholder="Bijv. 10" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <div class="form-group flex flex-col gap-2">
            <label for="image" class="text-sm font-semibold text-white/80">Image</label>
            <input type="text" name="image" id="image" placeholder="Bijv. midnight_echoes.jpg" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <div class="form-group flex flex-col gap-2">
            <label for="added_at" class="text-sm font-semibold text-white/80">Added At</label>
            <input type="datetime-local" name="added_at" id="added_at" class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white [color-scheme:dark] focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200" >
        </div>

        <button type="submit" class="btn inline-flex items-center justify-center px-6 py-3 bg-emerald-400 text-slate-900 font-semibold rounded-lg shadow-lg shadow-emerald-900/40 hover:bg-emerald-300 transition">Add album</button>

    </form>
</div>

</div>

   

    <!-- method is post bij forms -->
    <!--  als je op de label klikt, gaat die naar het input veld met dat id -->

    <!-- name bepaald de sleutel in de database waar de waarde in komt te staan -->
    
    
</body>
</html>
