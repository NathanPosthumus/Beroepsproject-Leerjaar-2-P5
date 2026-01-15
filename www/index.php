<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 5 - Music - De Notenkraker</title>
    <link rel="icon" type="image/jpeg" href="images/favicon.jpg">
    <link rel="shortcut icon" href="images/favicon.jpg">
    <link rel="stylesheet" href="style-nav.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 text-white/90">

    <?php include 'nav.php'; ?>
    <main class="max-w-5xl mx-auto px-6 py-24 text-center space-y-6">
        <h1 class="text-4xl md:text-5xl font-bold">Discover, Manage, and Enjoy Music</h1>
        <p class="text-lg text-white/70">Blader door onze collectie, bekijk details van albums en beheer je bibliotheek moeiteloos.</p>
        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="music.php" class="px-6 py-3 bg-white text-emerald-700 font-semibold rounded-full shadow hover:bg-slate-100 transition">Bekijk muziek</a>
            <a href="about.php" class="px-6 py-3 border border-white/40 text-white font-semibold rounded-full hover:bg-white/10 transition">Meer over het project</a>
        </div>
    </main>
</body>
</html>