<?php
session_start();
include "database.php";

$email = $_SESSION['email'];

/* GET USER */
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tandarts Dashboard</title>
<link rel="stylesheet" href="style-nav.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h2>Tandarts Dashboard</h2>

<h3>Your Info</h3>
<p>Email: <?php echo $_SESSION['email']; ?></p>
<p>Role: <?php echo $_SESSION['role']; ?></p>
<p>Created: <?php echo $_SESSION['created_at']; ?></p>
<p>Password: <?php echo $_SESSION['password']; ?></p>

<hr>

<h3>Update Info</h3>

<form method="POST" action="tandarts-info-update.php">
    <label>Email:</label><br>
    <input type="email" name="email">    <br><br>

    <label>New Password</label><br>
    <input type="password" name="password">    <br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php include 'footer.php'; ?>

</body>
</html>
