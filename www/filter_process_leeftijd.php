<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h1>Pets Page</h1>
<p>Welcome to the pets page!</p>

<!-- Age filter form -->
<div class="filter-container">
<form method="get" action="filter_process.php">
    <select name="breed">
        <option value="">-- Kies ras --</option>
        <option value="Siamees">Kat</option>
        <option value="Duitse Herder">Hond</option>
        <option value="Holland Lop">Konijn</option>
    </select>

    <button type="submit">Filter</button>
</form>

<div class="spacer"></div>

<form method="get" action="filter_process_leeftijd.php">
    <select name="age">
        <option value="">-- Kies leeftijd --</option>
        <option value="jong">0-2 jaar</option>
        <option value="volwassen">3-7 jaar</option>
        <option value="senior">8+ jaar</option>
    </select>

    <button type="submit">Filter</button>
</form>

<div class="spacer"></div>

<form method="get" action="filter_process_plus.php">
    <select name="age">
        <option value="">-- Kies leeftijd --</option>
        <option value="jong_naar_oud">jong naar oud</option>
        <option value="oud_naar_jong">oud naar jong</option>
    </select>

    <button type="submit">Filter</button>
</form>



</div>

<?php
require 'database.php';

// Get selected age
$age = $_GET['age'] ?? '';

// Build SQL
$sql = "SELECT * FROM pets";
if ($age === 'jong') {
    $sql .= " WHERE age BETWEEN 0 AND 2";
} elseif ($age === 'volwassen') {
    $sql .= " WHERE age BETWEEN 3 AND 6";
} elseif ($age === 'senior') {
    $sql .= " WHERE age >= 7";
}

// Run query
$result = mysqli_query($conn, $sql);
$pets = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

    
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

?>

</body>
</html>
