<?php
session_start();
include "database.php";

if (!isset($_SESSION['email'])) {
    echo 'Not logged in';
    exit;
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id='$id'";
} else {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email='$email'";
}

// Get current user
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die('User not found');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Patient Dashboard</title>
<link rel="stylesheet" href="style-nav.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h2>Patient Dashboard</h2>

<h3>Your Info</h3>
<p>Email: <?php echo $_SESSION['email'] ?? ''; ?></p>
<p>Role: <?php echo $_SESSION['role'] ?? ''; ?></p>
<p>Created: <?php echo $_SESSION['created_at'] ?? ''; ?></p>
<p>Password: <?php echo $_SESSION['password'] ?? ''; ?></p>
<p>Verzekering(s): <?php echo $_SESSION['verzekerings'] ?? ''; ?></p>

<hr>

<h3>Update Info</h3>

<form method="POST" action="patient-info-update.php">
    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>

    <label>New Password:</label><br>
    <input type="password" name="password"><br><br>

    <label>New Verzekering(s):</label><br>
    <input type="text" name="verzekerings" value="<?php echo $user['verzekerings']; ?>"><br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php include 'footer.php'; ?>

</body>
</html>
