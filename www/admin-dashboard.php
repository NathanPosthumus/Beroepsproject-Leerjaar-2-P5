<?php 
session_start();
if($_SESSION['role'] != 'worker') {
    header("location: index.php");
    exit;
}

include 'database.php';

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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="admin-dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-slate-950 via-slate-900 to-slate-800 text-white/90">

<?php include 'nav.php'; ?>

<div class="container-dashboard max-w-6xl mx-auto px-6 py-12 space-y-8 bg-white/5 border border-white/10 rounded-3xl shadow-2xl backdrop-blur">
    <h1 class="dashboard-title text-4xl font-bold text-white">Admin Dashboard</h1>
    <p class="dashboard-subtitle text-lg text-white/70">Manage users and roles below</p>

    <table class="admin-table min-w-full border border-white/10 rounded-xl overflow-hidden shadow bg-white/5">
        <thead class="bg-white/10">
            <tr class="text-left text-xs font-semibold uppercase tracking-wider text-white/70">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Username</th>
                <th class="px-4 py-3">Role</th>
                <th class="px-4 py-3">Details</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/10">
            <?php foreach($users as $user): ?>
            <tr class="hover:bg-white/10 transition">
                <td class="px-4 py-3 text-sm text-white/90"><?php echo ($user['id']); ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php echo ($user['username']); ?></td>
                <td class="px-4 py-3 text-sm text-white/90"><?php if(isset($user['role'])) echo ($user['role']); 
                else echo "NULL"; ?></td>
                <td class="px-4 py-3 text-sm font-semibold text-emerald-300">
                    <a href="user_details.php?id=<?php echo ($user['id']); ?>" class="details-link hover:underline">View Details</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm font-semibold text-white/80">
        <div class="flex items-center justify-between rounded-lg bg-white/10 border border-white/10 shadow px-4 py-3">aantal gebruikers: <span class="text-emerald-300"><?php echo count($users); ?></span></div>
        <div class="flex items-center justify-between rounded-lg bg-white/10 border border-white/10 shadow px-4 py-3">aantal albums: <span class="text-emerald-300"><?php echo count($music); ?></span></div>
    </div>
</div>

</body>
</html>
