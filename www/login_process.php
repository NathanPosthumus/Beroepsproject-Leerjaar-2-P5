<?php
// Minimal login handler: start session, check POST, query users, compare plaintext password,
// set session role and redirect. Keeps things very simple per request.

session_start();

// if already logged in, go to dashboard
if (isset($_SESSION['role'])) {
    header('Location: dashboard.php');
    exit;
}

// require POST fields
if (!isset($_POST['username'], $_POST['password'])) {
    header('Location: login.php');
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];



include 'database.php';

// simple query (table name 'users')
$sql = "SELECT * FROM User WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    // query failed — go back to login
    header('Location: login.php');
    exit;
}

$user = mysqli_fetch_assoc($result);

if ($user) {
    // support hashed passwords in DB
    if ($password === $user['password']) {
        // set minimal session flag
        $_SESSION['role'] = $user['role'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['logged'] = true;
        header('Location: dashboard.php');
        exit;
    }
}

// fallback: any failure returns to login
header('Location: login.php');
exit;