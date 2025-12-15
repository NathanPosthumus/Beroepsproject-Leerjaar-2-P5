<?php session_start(); 

require 'database.php';

$sql = "SELECT * FROM User";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM Album";
$result2 = mysqli_query($conn, $sql);
$music = mysqli_fetch_all($result2, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style-stats.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h1>Statistics Page</h1>
<p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

<h2>User Statistieken:</h2>

<ul>
    <li>First Name: <?php echo $_SESSION['firstname']; ?></li>
    <li>Last Name: <?php echo $_SESSION['lastname']; ?></li>
    <li>Email: <?php echo $_SESSION['email']; ?></li>
    <li>Username: <?php echo $_SESSION['username']; ?></li>
    <li>Password: <?php echo $_SESSION['password']; ?></li>
</ul>

<h2>Album Statistieken:</h2>

<ul>
    <div>aantal albums: <?php echo count($music); ?></div>
    <li>aantal users: <?php echo count($users); ?></li>
</ul>

</body>
</html>