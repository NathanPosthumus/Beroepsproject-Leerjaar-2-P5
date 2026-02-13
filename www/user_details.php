<?php
session_start();
if(!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}
require 'database.php';

$user_id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM User WHERE id = $user_id");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>User Details</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h1>User Details</h1>
<p>Details for user: <?php echo $user['username']; ?></p>

<table>
    <tr>
        <th>ID</th>
        <td><?php echo $user['id']; ?></td>
    </tr>
    <tr>
        <th>Username</th>
        <td><?php echo $user['username']; ?></td>
    </tr>
    <tr>
        <th>Role</th>
        <td><?php echo $user['role']; ?></td>
    </tr>
</table>

<?php include 'footer.php'; ?>

</body>
</html>
