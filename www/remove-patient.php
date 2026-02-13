<?php
session_start();
include 'database.php';

if (!isset($_SESSION['email'])) {
    die('Not logged in');
}

if (!isset($_POST['id'])) {
    die('Geen patient gekozen');
}

$id = $_POST['id'];

//resetten zodat gebruikers die verwijderd zijn geen afspraken nog hebben staan, en dat deze weer open komen te staan voor andere gebruikers
$sql_reset = "UPDATE appointments 
              SET patient_id = NULL, status='open' 
              WHERE patient_id='$id'";
mysqli_query($conn, $sql_reset);


$sql_delete = "DELETE FROM users WHERE id='$id'";
mysqli_query($conn, $sql_delete);

header("Location: patienten_lijst.php");
exit;
?>
