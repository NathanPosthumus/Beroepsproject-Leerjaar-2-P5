<?php
session_start();
include 'database.php';

$sql = "SELECT *
    FROM users
    WHERE role='patient'";

$result = mysqli_query($conn, $sql);
$patienten = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patienten Lijst</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h2>Ingeplande afspraken</h2>

<?php if (empty($patienten)) { ?>
    <p>Geen patienten</p>
<?php } else { ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>id</th>
            <th>email</th>
            <th>role</th>
            <th>Created at</th>
            <th>actions</th>
        </tr>

        <?php foreach ($patienten as $p) { ?>
            <tr>
                <td><?php echo $p['id']; ?></td>
                <td><?php echo $p['email']; ?></td>
                <td><?php echo $p['role']; ?></td>
                <td><?php echo $p['created_at']; ?></td>
                <td>
                    <a href="detail-patient.php?id=<?php echo $p['id']; ?>">details</a>
            </tr>
        <?php } ?>
    </table>
<?php } ?>


    
<?php include 'footer.php'; ?>
</body>
</html>