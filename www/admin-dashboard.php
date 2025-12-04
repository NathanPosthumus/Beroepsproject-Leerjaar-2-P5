<?php 
session_start();
if($_SESSION['role'] != 'admin') {
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="admin-dashboard.css">
</head>
<body>

<?php include 'nav.php'; ?>

<div class="container-dashboard">
    <h1 class="dashboard-title">Admin Dashboard</h1>
    <p class="dashboard-subtitle">Manage users and roles below</p>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo ($user['id']); ?></td>
                <td><?php echo ($user['username']); ?></td>
                <td><?php if(isset($user['role'])) echo ($user['role']); 
                else echo "NULL"; ?></td>
                <td>
                    <a href="user_details.php?id=<?php echo ($user['id']); ?>" class="details-link">View Details</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>aantal gebruikers: <?php echo count($users); ?></div>
    <div>aantal albums: <?php echo count($music); ?></div>
</div>

</body>
</html>
