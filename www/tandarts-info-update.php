<?php
session_start();

//checks
if (!isset($_POST['email'], $_POST['password'])) {
    die("Form data not submitted properly.");
}

if (empty($_POST['password'])) {
    $password = $_SESSION['password'];
}

if (empty($_POST['email'])) {
    $email = $_SESSION['email'];
}

if(!empty($_POST['email'])) {
    $email = $_POST['email'];
}

if(!empty($_POST['password'])) {
    $password = $_POST['password'];
}

include 'database.php';

$sql = "UPDATE users SET 
        email='$email', 
        password='$password' 
        WHERE email='{$_SESSION['email']}'";

if (mysqli_query($conn, $sql)) {

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: patient-dashboard.php");
    exit;

} else {
    echo "Error updating user: " . mysqli_error($conn);
}
?>
