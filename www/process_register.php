<?php


if(
    !isset(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['email'],
        $_POST['username'],
        $_POST['password'],
    
    )
) {
    die("Form data not submitted properly.");
}

// check of niks leeg is
if(
    empty($_POST['firstname']) ||
    empty($_POST['lastname']) ||
    empty($_POST['email']) ||
    empty($_POST['username']) ||
    empty($_POST['password']) 
  
) {
    die("Please fill in all required fields.");
}


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

include 'database.php';

$sql = "INSERT INTO User (firstname, lastname, email, username, password)
        VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";

if (mysqli_query($conn, $sql)) {
    header("Location: login.php");
    exit;
} else {
    echo "Error inserting user";
}

?>
