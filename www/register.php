<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style-nav.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">
    <?php include 'nav.php'; ?>

    <h1 class="text-4xl font-bold text-center mt-12 text-white">Register</h1>
    <form action="process_register.php" method="POST" class="max-w-2xl mx-auto mt-8 bg-white/10 border border-white/10 backdrop-blur rounded-2xl shadow-2xl px-10 py-10 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col gap-2">
            <label for="firstname" class="text-sm font-semibold text-white/80">firstname:</label>
            <input type="text" id="firstname" name="firstname" required class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200">
        </div>

        <div class="flex flex-col gap-2">
            <label for="lastname" class="text-sm font-semibold text-white/80">lastname:</label>
            <input type="text" id="lastname" name="lastname" required class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200">
        </div>

        <div class="flex flex-col gap-2">
            <label for="email" class="text-sm font-semibold text-white/80">email:</label>
            <input type="text" id="email" name="email" required class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200">
        </div>

        <div class="flex flex-col gap-2">
            <label for="username" class="text-sm font-semibold text-white/80">username:</label>
            <input type="text" id="username" name="username" required class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200">
        </div>

        <div class="flex flex-col gap-2 md:col-span-2">
            <label for="password" class="text-sm font-semibold text-white/80">password:</label>
            <input type="password" id="password" name="password" required class="rounded-md border border-white/20 bg-white/5 px-4 py-2 text-white placeholder-white/50 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200">
        </div>

        <div class="md:col-span-2">
            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 bg-white text-emerald-700 font-semibold rounded-md shadow hover:bg-slate-100 transition">submit</button>
        </div>
    </form>
</body>
</html>