<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Project 7 - Pets - De Vrolijke Viervoeter</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h1>Dashboard</h1>
<p>Welcome to the dashboard!</p>

</body>
</html>
