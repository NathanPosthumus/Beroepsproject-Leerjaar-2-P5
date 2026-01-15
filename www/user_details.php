<?php
session_start();
if(!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}
require 'database.php';
$user_id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if(!$user) {
    echo "User not found.";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="admin-dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">

<?php include 'nav.php'; ?>
<div class="container-dashboard max-w-3xl mx-auto px-6 py-12 space-y-6 bg-white/5 border border-white/10 rounded-3xl shadow-2xl backdrop-blur">
    <h1 class="dashboard-title text-4xl font-bold text-white">User Details</h1>
    <p class="dashboard-subtitle text-lg text-white/70">Details for user: <?php echo ($user['username']); ?></p>

    <table class="admin-table min-w-full border border-white/10 rounded-2xl overflow-hidden shadow bg-white/5">
        <tr class="bg-white/10 text-left text-xs font-semibold uppercase tracking-wider text-white/80">
            <th class="px-4 py-3">ID</th>
            <td class="px-4 py-3 text-sm text-white"><?php echo ($user['id']); ?></td>
        </tr>
        <tr class="border-t border-white/10">
            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/80">Username</th>
            <td class="px-4 py-3 text-sm text-white"><?php echo ($user['username']); ?></td>
        </tr>
        <tr class="border-t border-white/10">
            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white/80">Role</th>
            <td class="px-4 py-3 text-sm text-white"><?php echo ($user['role']); ?></td>
        </tr>
    </table>
    </div>
    
</body>
</html>