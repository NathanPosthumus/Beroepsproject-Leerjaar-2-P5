<?php
session_start();

// role dentist dan heeft de gebruiker toegang tot deze pagina, anders terug naar index.php
if ($_SESSION['role'] != 'dentist') {
    header("location: index.php");
    exit;
}

include 'database.php';

$sql = "SELECT * FROM users where role = 'dentist'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Dentist Dashboard</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h1>Dentist Dashboard</h1>
<p>Manage users and roles</p>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Details</th>
    </tr>

    <?php foreach ($users as $u): ?>
    <tr>
        <td><?php echo $u['id']; ?></td>
        <td><?php echo $u['username'];?></td>
        <td><?php echo $u['role'];?></td>
        <td>
            <a href="user_details.php?id=<?php echo $u['id']; ?>">View details</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>

</body>
</html>
