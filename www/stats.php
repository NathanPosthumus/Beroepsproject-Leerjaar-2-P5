<?php session_start(); 

include 'database.php';

$users = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM User"), MYSQLI_ASSOC);
$music = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM Album"), MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Statistics</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h1>Statistics Page</h1>
<p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

<h2>User Statistics:</h2>
<ul>
    <li>First Name: <?php echo $_SESSION['firstname']; ?></li>
    <li>Last Name: <?php echo $_SESSION['lastname']; ?></li>
    <li>Email: <?php echo $_SESSION['email']; ?></li>
    <li>Username: <?php echo $_SESSION['username']; ?></li>
    <li>Password: <?php echo $_SESSION['password']; ?></li>
</ul>

<h2>Album Statistics:</h2>
<ul>
    <li>Aantal albums: <?php echo count($music); ?></li>
    <li>Aantal users: <?php echo count($users); ?></li>
</ul>

</body>
</html>
