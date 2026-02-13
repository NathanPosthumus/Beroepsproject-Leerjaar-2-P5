<?php
session_start();
include 'database.php';

//simpele checks, kijken of de gebruiker ingelogd is

if (!isset($_SESSION['email'])) {
    die('Not logged in');
}

// haal huidige id op uit db
$sql_user = "SELECT id FROM users WHERE email='" . $_SESSION['email'] . "'";
$result_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result_user);

if (!$user) {
    die('User not found');
}

$user_id = $user['id'];

$sql = "UPDATE appointments SET status='open', patient_id=NULL WHERE patient_id='$user_id'";
mysqli_query($conn, $sql);

header('Location: book_appointment.php');
exit;
?>
