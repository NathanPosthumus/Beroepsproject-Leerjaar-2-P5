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
    $sql = "SELECT * FROM pets WHERE name LIKE '$zoekterm%'";
    $result = mysqli_query($conn, $sql);
    $pets = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
    <h1>Zoekresultaten voor: <?php echo $zoekterm; ?></h1> 
    <?php foreach($pets as $pet): ?>

    <table border="1">
        <tr>
        <th>Name</th>
        <th>Species</th>
        <th>Breed</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Description</th>
        <th>Size</th>
        <th>Status</th>
        <th>Image</th>
        <th>Added At</th>
        <th>Actions</th>
    </tr>
    <tr>

        <td><?php echo $pet['name'] . "";?></td>
        <td><?php echo $pet['species'] . "";?></td>
        <td><?php echo $pet['breed'] . "";?></td>
        <td><?php echo $pet['age'] . "";?></td>
        <td><?php echo $pet['gender'] . "";?></td>
        <td><?php echo $pet['description'] . "";?></td>
        <td><?php echo $pet['size'] . "";?></td>
        <td><?php echo $pet['status'] . "";?></td>
        <td><img src="images/<?= $pet['image'] ?>" alt="<?= $pet['image'] ?>"></td>
        <td><?php echo $pet['added_at'] . "";?></td>

        <td>
            <a href="detail-pets.php?id=<?php echo $pet['id']; ?>">details</a>
        </td>
    </tr>
    </table>
    <?php endforeach; ?>
<?php
} else {
    echo "Geen zoekterm opgegeven.";
}

?>

</body>
</html>
