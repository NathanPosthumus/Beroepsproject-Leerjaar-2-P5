<?php session_start(); 

if(!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="admin-dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">
    <?php include 'nav.php'; ?>
    <div class="max-w-4xl mx-auto px-6 py-12 space-y-4 bg-white/10 border border-white/10 rounded-2xl shadow-2xl backdrop-blur">
        <h1 class="text-4xl font-bold text-white">Dashboard</h1>
        <p class="text-lg text-white/70">Welcome to the dashboard!</p>
    </div>
</body>
</html>