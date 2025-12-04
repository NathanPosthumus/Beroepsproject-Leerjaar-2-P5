<?php session_start(); 

if(!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="admin-dashboard.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <h1>Dashboard</h1>
    <p>Welcome to the dashboard!</p>
</body>
</html>