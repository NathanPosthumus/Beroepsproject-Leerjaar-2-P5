<?php
session_start();


if (!isset($_POST['email'], $_POST['password'])) {
    header('Location: login.php');
    exit;
}

// check of niks leeg is
if(
    
    empty($_POST['email']) ||
    empty($_POST['password']) 
  
) {
    die("Please fill in all required fields.");
}




$email = $_POST['email'];
$password = $_POST['password'];

include 'database.php';

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    header('Location: login.php');
    exit;
}

if ($password == $user['password']) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['created_at'] = $user['created_at'];
    header("Location: index.php");
    exit;
}

header("Location: login.php");
exit;
?>
