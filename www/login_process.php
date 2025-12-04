<?php

if(isset($_SESSION['role'])){
    header("location: dashboard.php");
    exit;
}

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

require 'database.php';

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if(is_array($user)){
    if($password == $user['password']){
        $_SESSION['role'] = $user['role'];
        header("location: dashboard.php");
        echo "Login succesvol!";
        
        exit;
    }
} else {
    
    echo "Email is bij ons onbekend";

    exit;
}