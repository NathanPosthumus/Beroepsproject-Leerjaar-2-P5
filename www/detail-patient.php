<?php
session_start();
include 'database.php';

//voorkomen dat ze zonder id naar deze pagina gaan bijvoorbeeld door in de url te typen detail-patient.php zonder ?id=1 
if (!isset($_GET['id'])) {
    echo "Geen patient gekozen";
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $id AND role='patient'";
$result = mysqli_query($conn, $sql);
$patient = mysqli_fetch_assoc($result);

if (!$patient) {
    echo "Patient niet gevonden";
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

<h2>Patient Details</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <td><?php echo $patient['id']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $patient['email']; ?></td>
    </tr>
    <tr>
        <th>Role</th>
        <td><?php echo $patient['role']; ?></td>
    </tr>
    <tr>
        <th>Created At</th>
        <td><?php echo $patient['created_at']; ?></td>
    </tr>
</table>

<br>

<a href="patienten_lijst.php">← Terug naar overzicht</a>
    
<form method="POST" action="remove-patient.php">
    <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
    <button type="submit" name="delete">Verwijder patient</button>
</form>

<?php include 'footer.php'; ?>

</body>
</html>
