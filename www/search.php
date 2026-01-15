<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="search.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">

<?php include 'nav.php'; ?>

<form action="search_process.php" method="GET" class="max-w-xl mx-auto mt-16 bg-white/10 border border-white/10 backdrop-blur rounded-xl shadow px-8 py-6 space-y-5">
    <label for="zoekterm" class="block text-sm font-semibold text-white/80">Zoek op album</label>
    <input type="text" name="zoekterm" id="zoekterm" placeholder="Zoek op album" class="w-full rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200">
    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-2 bg-white text-emerald-700 font-semibold rounded-md shadow hover:bg-slate-100 transition">Zoek!</button>
</form>

</body>
</html>