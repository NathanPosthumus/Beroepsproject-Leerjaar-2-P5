<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Employee') {
    header("location: login.php");
    exit;
}

require 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Project 7 - Pets - De Vrolijke Viervoeter</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h2>Product maken</h2>

<form action="add_pet_process.php" method="POST">

    <p>
        <label>name</label><br>
        <input type="text" name="name">
    </p>

    <p>
        <label>Breed</label><br>
        <input type="text" name="breed">
    </p>

    <p>
        <label>species</label><br>
        <input type="text" name="species">
    </p>

    <p>
        <label>age</label><br>
        <input type="text" name="age">
    </p>

    <p>
        <label>gender</label><br>
        <input type="text" name="gender">
    </p>

    <p>
        <label>description</label><br>
        <input type="text" name="description">
    </p>

    <p>
        <label>size</label><br>
        <input type="number" name="size">
    </p>

    <p>
        <label>status</label><br>
        <input type="text" name="status">
    </p>

    <p>
        <label>Added at</label><br>
        <input type="datetime-local" name="added_at">
    </p>

    <p>
        <label>Image</label><br>
        <input type="text" name="image">
    </p>

    <button type="submit">Add pet</button>

</form>

</body>
</html>
