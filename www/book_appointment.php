<?php
session_start();
include "database.php";

if (!isset($_SESSION['email'])) {
    die("Not logged in");
}

/* Get all open appointments */
$sql_appointments = "SELECT * 
                     FROM appointments 
                     WHERE status='open' and patient_id IS NULL
                     ORDER BY appointment_date, appointment_time";

$result_appointments = mysqli_query($conn, $sql_appointments);
$appointments = mysqli_fetch_all($result_appointments, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Appointments</title>
<link rel="stylesheet" href="style-nav.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h2>Available Appointments</h2>

<?php if (empty($appointments)) { ?>
    <p>No available appointments at the moment.</p>
<?php } else { ?>
    <?php foreach ($appointments as $row) { ?>
        <form method="POST" action="book_appointment_process.php" style="margin-bottom:10px;" onsubmit="return confirm('Weet je zeker dat je deze afspraak wilt boeken?');">
            
            <b>Date:</b> <?php echo $row['appointment_date']; ?>
            <b>Time:</b> <?php echo $row['appointment_time']; ?>

            <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
            
            <button type="submit" name="book">Choose</button>
        </form>
    <?php } ?>
<?php } ?>

<h2>Heb je al een afspraak kijk dan bij <a href="booked_appointments.php">Mijn afspraken</a></h2>

<div class="spacer"></div>

<?php include 'footer.php'; ?>

</body>
</html>