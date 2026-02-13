<?php
session_start();
include 'database.php';

$email = $_POST['email'];
$password = $_POST['password'];
$verzekerings = $_POST['verzekerings'];

$sql = "UPDATE users SET 
        email='$email', 
        password='$password',
        verzekerings='$verzekerings'
        WHERE email='{$_SESSION['email']}'";

mysqli_query($conn, $sql);

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['verzekerings'] = $verzekerings;

header("Location: patient-dashboard.php");
exit;
?>
