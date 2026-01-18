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

$sql = "SELECT * FROM User WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($user && $password == $user['password']) {
    $_SESSION['role'] = $user['role'];
    $_SESSION['username'] = $user['username'];
    header("Location: dashboard.php");
    exit;
}

header("Location: login.php");
exit;
?>
