<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style-nav.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">
    <?php include 'nav.php'; ?>

    <h1 class="text-4xl font-bold text-center mt-12 text-white">Login</h1>
    <form action="login_process.php" method="POST" class="max-w-md mx-auto mt-8 bg-white/10 border border-white/10 backdrop-blur rounded-xl shadow-2xl px-8 py-8 space-y-6">
        <div class="space-y-2">
            <label for="username" class="block text-sm font-semibold text-white/80">Username:</label>
            <input type="text" id="username" name="username" required class="w-full rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200">
        </div>

        <div class="space-y-2">
            <label for="password" class="block text-sm font-semibold text-white/80">Password:</label>
            <input type="password" id="password" name="password" required class="w-full rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200">
        </div>

        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 bg-white text-emerald-700 font-semibold rounded-md shadow hover:bg-slate-100 transition">submit</button>
    </form>
</body>
</html>