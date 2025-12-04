<?php 


// haal je op uit de form met de name attribuut
// nu sla je eigenlijk alles op in vars (alles van de form sla je op in een var)

// basic validation


/// check of alles is ingevuld
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

// optioneel: check max lengte
if(
    strlen($_POST['firstname']) > 50 ||
    strlen($_POST['lastname']) > 50 ||
    strlen($_POST['email']) > 50 ||
    strlen($_POST['username']) > 50 ||
    strlen($_POST['password']) > 50
) {
    die("info die gegeven is is te lang of onjuist.");
}

// waardes opslaan
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];



require 'database.php';

$sql = "INSERT INTO User (firstname, lastname, email, username, password) 
        VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";

if(mysqli_query($conn, $sql)){
    
    // Redirect to login page or another appropriate page
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}





?>