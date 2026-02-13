<?php
session_start();
include 'database.php';

if (!isset($_GET['id'])) {
    echo "Geen tandarts gekozen";
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id AND role='dentist'";
$result = mysqli_query($conn, $sql);
$tandarts = mysqli_fetch_assoc($result);

if (!$tandarts) {
    echo "Tandarts niet gevonden";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h2>Tandarts Details</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <td><?php echo $tandarts['id']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $tandarts['email']; ?></td>
    </tr>
    <tr>
        <th>Role</th>
        <td><?php echo $tandarts['role']; ?></td>
    </tr>
    <tr>
        <th>Created At</th>
        <td><?php echo $tandarts['created_at']; ?></td>
    </tr>
</table>

<br>

<a href="tandarts_lijst.php">← Terug naar overzicht</a>


<?php include 'footer.php'; ?>

</body>
</html>
