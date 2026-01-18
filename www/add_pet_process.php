<?php

require 'database.php';


if(
    !isset(
     
        $_GET['name'],
        $_GET['breed'],
        $_GET['species'],
        $_GET['age'],
        $_GET['gender'],
        $_GET['description'],
        $_GET['size'],
        $_GET['status'],
        $_GET['image'],
        $_GET['added_at']
    )
) {
    die("Form data not submitted properly.");
}

// check of niks leeg is
if(

    empty($_GET['name']) ||
    empty($_GET['breed']) ||
    empty($_GET['species']) ||
    empty($_GET['age']) ||
    empty($_GET['gender']) ||
    empty($_GET['description']) ||
    empty($_GET['size']) ||
    empty($_GET['status']) ||
    empty($_GET['image']) ||
    empty($_GET['added_at'])
) {
    die("Please fill in all required fields.");
}


$name = $_POST['name'];
$breed = $_POST['breed'];
$species = $_POST['species'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$description = $_POST['description'];
$size = $_POST['size'];
$status = $_POST['status'];
$image = $_POST['image'];
$added_at = $_POST['added_at'];

   

$sql = "INSERT INTO pets (name, breed, species, age, gender, description, size, status, image, added_at)
        VALUES ('$name', '$breed', '$species', '$age', '$gender', '$description', '$size', '$status', '$image', '$added_at')";

if (mysqli_query($conn, $sql)) {
    header("Location: pets.php");
    exit();
} else {
    echo "Database error";
}

?>
