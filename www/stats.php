<?php session_start(); 

require 'database.php';

$sql = "SELECT * FROM User";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM Album";
$result2 = mysqli_query($conn, $sql);
$music = mysqli_fetch_all($result2, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style-stats.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">

<?php include 'nav.php'; ?>

<div class="max-w-4xl mx-auto px-6 py-12 space-y-8 bg-white/5 border border-white/10 rounded-3xl shadow-2xl backdrop-blur">
<h1 class="text-4xl font-bold text-white">Statistics Page</h1>
<p class="text-lg text-white/70">Welcome, <?php echo $_SESSION['username']; ?>!</p>

<h2 class="text-2xl font-semibold text-white/90">User Statistieken:</h2>

<ul class="space-y-2 text-sm text-white/80 bg-white/10 border border-white/10 rounded-xl shadow px-6 py-6">
    <li class="flex items-center justify-between"><span>First Name:</span> <span class="font-semibold text-white"><?php echo $_SESSION['firstname']; ?></span></li>
    <li class="flex items-center justify-between"><span>Last Name:</span> <span class="font-semibold text-white"><?php echo $_SESSION['lastname']; ?></span></li>
    <li class="flex items-center justify-between"><span>Email:</span> <span class="font-semibold text-white"><?php echo $_SESSION['email']; ?></span></li>
    <li class="flex items-center justify-between"><span>Username:</span> <span class="font-semibold text-white"><?php echo $_SESSION['username']; ?></span></li>
    <li class="flex items-center justify-between"><span>Password:</span> <span class="font-semibold text-white"><?php echo $_SESSION['password']; ?></span></li>
</ul>

<h2 class="text-2xl font-semibold text-white/90">Album Statistieken:</h2>

<ul class="space-y-3 text-sm text-white/80 bg-white/10 border border-white/10 rounded-xl shadow px-6 py-6">
    <div class="flex items-center justify-between font-semibold text-white">aantal albums: <span class="text-emerald-300"><?php echo count($music); ?></span></div>
    <li class="flex items-center justify-between font-semibold text-white">aantal users: <span class="text-emerald-300"><?php echo count($users); ?></span></li>
</ul>
</div>

</body>
</html>