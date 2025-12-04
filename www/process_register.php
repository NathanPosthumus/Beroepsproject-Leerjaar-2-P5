<?php 


// haal je op uit de form met de name attribuut
// nu sla je eigenlijk alles op in vars (alles van de form sla je op in een var)

// basic validation


/// check of alles is ingevuld
if(
    !isset(
        $_POST['username'],
        $_POST['password'],
    )
) {
    die("Form data not submitted properly.");
}

// check of niks leeg is
if(
    empty($_POST['username']) ||
    empty($_POST['password'])
) {
    die("Please fill in all required fields.");
}

// strlen + validatie controleren
if(
    strlen($_POST['username']) > 20 ||
    strlen($_POST['password']) > 20
) {
    die("info die gegeven is is te lang of onjuist.");
}

// waardes opslaan
$username = $_POST['username'];
$password = $_POST['password'];



require 'database.php';

$sql = "INSERT INTO users (username, password) 
        VALUES ('$username', '$password')";

if(mysqli_query($conn, $sql)){
    
    // Redirect to login page or another appropriate page
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}





?>