<?php
session_start();
include 'database.php';

if(!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit;
}

if(!isset($_POST['email'], $_POST['password'], $_POST['verzekerings'])) {
        header('Location: patient-dashboard.php');
        exit;
}


$current_email = $_SESSION['email'];

// houdt de session waarden vast als er niks ingevuld wordt in het formulier zodat er geen errors komen en de user niet perongeluk zijn email of wachtwoord kwijt raakt als hij alleen zijn verzekering wil aanpassen
$email = $_POST['email'];
if($email == '') {
        $email = $current_email;
}

$password = $_POST['password'];
if($password == '') {
        $password = $_SESSION['password'] ?? '';
}

$verzekerings = $_POST['verzekerings'];
if($verzekerings == '') {
        $verzekerings = $_SESSION['verzekerings'] ?? '';
}

$sql = "UPDATE users SET 
                email='$email', 
                password='$password',
                verzekerings='$verzekerings'
                WHERE email='$current_email'";

mysqli_query($conn, $sql);

// update session so user stays logged in after changing details
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['verzekerings'] = $verzekerings;


header("Location: patient-dashboard.php");
exit;
?>
