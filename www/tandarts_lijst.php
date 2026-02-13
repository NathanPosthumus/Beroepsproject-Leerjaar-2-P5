<?php
session_start();
include 'database.php';

$sql = "SELECT *
    FROM users
    WHERE role='dentist'";

$result = mysqli_query($conn, $sql);
$tandarts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tandarts Lijst</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h2>tandarts lijst</h2>

<?php if (empty($tandarts)) { ?>
    <p>Geen tandarts gevonden</p>
<?php } else { ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>id</th>
            <th>email</th>
            <th>role</th>
            <th>Created at</th>
            <th>actions</th>
        </tr>

        <?php foreach ($tandarts as $t) { ?>
            <tr>
                <td><?php echo $t['id']; ?></td>
                <td><?php echo $t['email']; ?></td>
                <td><?php echo $t['role']; ?></td>
                <td><?php echo $t['created_at']; ?></td>
                <td>
                    <a href="detail-tandarts.php?id=<?php echo $t['id']; ?>">details</a>
            </tr>
        <?php } ?>
    </table>
<?php } ?>


    
<?php include 'footer.php'; ?>
</body>
</html>