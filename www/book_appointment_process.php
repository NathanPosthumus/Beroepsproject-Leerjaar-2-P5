<?php
session_start();
include "database.php";

if (!isset($_SESSION['email'])) {
    die("Not logged in");
}

$appointment_id = $_POST['appointment_id'];

// Get logged-in user id
$sql_user = "SELECT id FROM users WHERE email='{$_SESSION['email']}'";
$result_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_assoc($result_user);

if (!$user) {
    die("User not found.");
}

$user_id = $user['id'];

// dubbele check: heeft deze gebruiker al een afspraak? Zo ja, dan mag hij geen nieuwe boeken
$sql_check = "SELECT id FROM appointments WHERE patient_id='$user_id' AND status='gepland'";
$result_check = mysqli_query($conn, $sql_check);
$bestaatAl = mysqli_fetch_assoc($result_check);

//krijgt dan error / alert
if ($bestaatAl) {
    echo "<script>alert('You already have an appointment!'); window.history.back();</script>";
    exit;
}

// book appointment process: update appointment status and assign patient_id
$sql_update = "UPDATE appointments 
               SET status='gepland', patient_id='$user_id' 
               WHERE id='$appointment_id' AND status='open'";
mysqli_query($conn, $sql_update);


header("Location: booked_appointments.php");
exit;
?>
