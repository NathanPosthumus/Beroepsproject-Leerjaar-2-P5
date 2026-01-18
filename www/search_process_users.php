<?php


if(
    !isset(

        $_GET['zoekterm']
       
    )
) {
    die("Form data not submitted properly.");
}

// check of niks leeg is
if(
    empty($_GET['zoekterm'])
) {
    die("Please fill in all required fields.");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php

include 'nav.php';
//validatie
if(isset($_GET['zoekterm']) && !empty($_GET['zoekterm'])){
    
    $zoekterm = $_GET['zoekterm'];

    require 'database.php';
    $sql = "SELECT * FROM users WHERE firstname LIKE '$zoekterm%' OR lastname LIKE '$zoekterm%'";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
    <h1>Zoekresultaten voor: <?php echo $zoekterm; ?></h1> 
    <?php foreach($users as $user): ?>

    <table border="1">
        <tr>
        <th>firstname</th>
        <th>lastname</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
        <th>role</th>
        <th>Details</th>

    </tr>
    <tr>

        <td><?php echo $user['firstname'] . "";?></td>
        <td><?php echo $user['lastname'] . "";?></td>
        <td><?php echo $user['email'] . "";?></td>
        <td><?php echo $user['username'] . "";?></td>
        <td><?php echo $user['password'] . "";?></td>
        <td><?php echo $user['role'] . "";?></td>
        <td><a href="detail-users.php?id=<?php echo $user['id']; ?>">Details</a></td>
    </table>
    <?php endforeach; ?>
<?php
} else {
    echo "Geen zoekterm opgegeven.";
}

?>

</body>
</html>
