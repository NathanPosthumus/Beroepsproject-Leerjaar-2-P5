<?php
session_start();

if (isset($_SESSION['role'])) {
    header("Location: dashboard.php");
    exit;
}

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: login.php");
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

include 'database.php';

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($password == $user['password']) {
    $_SESSION['role'] = $user['role'];
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['username'] = $user['username'];
    header("Location: dashboard.php");
    exit;
}

header("Location: login.php");
exit;
?>
