<?php
session_start();

if ($_SESSION['role'] != 'worker') {
    header("location: index.php");
    exit;
}

include 'database.php';

$result = mysqli_query($conn, "SELECT * FROM User");
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$result2 = mysqli_query($conn, "SELECT * FROM Album");
$music = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h1>Admin Dashboard</h1>
<p>Manage users and roles</p>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Details</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo isset($user['role']) ? $user['role'] : 'NULL'; ?></td>
        <td>
            <a href="user_details.php?id=<?php echo $user['id']; ?>">View details</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<p>Aantal gebruikers: <?php echo count($users); ?></p>
<p>Aantal albums: <?php echo count($music); ?></p>

</body>
</html>
