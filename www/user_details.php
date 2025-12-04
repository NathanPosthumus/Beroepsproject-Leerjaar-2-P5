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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="admin-dashboard.css">
</head>
<body>

<?php include 'nav.php'; ?>
<div class="container-dashboard">
    <h1 class="dashboard-title">User Details</h1>
    <p class="dashboard-subtitle">Details for user: <?php echo ($user['username']); ?></p>

    <table class="admin-table">
        <tr>
            <th>ID</th>
            <td><?php echo ($user['id']); ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?php echo ($user['username']); ?></td>
        </tr>
        <tr>
            <th>Role</th>
            <td><?php echo ($user['role']); ?></td>
        </tr>
    </table>
    
</body>
</html>