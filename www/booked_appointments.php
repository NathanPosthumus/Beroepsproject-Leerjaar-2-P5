<?php
session_start();
include "database.php";

//weer simpele check of de user wel is ingelogd, anders kunnen ze hier ook niet komen
if (!isset($_SESSION['email'])) {
    die("Not logged in");
}

/* Get all booked appointments */
$sql_appointments = "SELECT * 
                     FROM appointments 
                     WHERE status='gepland' AND patient_id IS NOT NULL
                     ORDER BY appointment_date, appointment_time";

$result_appointments = mysqli_query($conn, $sql_appointments);
$appointments = mysqli_fetch_all($result_appointments, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Booked Appointments</title>
<link rel="stylesheet" href="style-nav.css">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h2>Booked Appointments</h2>

<?php if (empty($appointments)) { ?>
    <p>No booked appointments at the moment.</p>

<?php } else { ?>

    <?php foreach ($appointments as $a) { ?>

        <?php
        // placeholder email
        $user_email = "Unknown";

        if (!empty($a['patient_id'])) {

            //email ophalen van de user die deze afspraak heeft geboekt
            $sql_user = "SELECT email FROM users WHERE id = " . $a['patient_id'];
            $result_user = mysqli_query($conn, $sql_user);
            $user_data = mysqli_fetch_assoc($result_user);

            if ($user_data) {
                $user_email = $user_data['email'];
            }
        }
        ?>

        <table border="1" style="margin-bottom:10px;">
            <tr>
                <td><b>Date:</b> <?php echo $row['appointment_date']; ?></td>
                <td><b>Time:</b> <?php echo $row['appointment_time']; ?></td>
                <td><b>Booked by:</b> <?php echo $user_email; ?></td>
            </tr>
        </table>

    <?php } ?>

<?php } ?>

<h2>Nieuwe afspraak? / huidige afspraak verwijderen?</h2>

<form action="appointment_delete_process.php" method="post">
    <button type="submit">Maak een nieuwe afspraak / verwijder huidige afspraak</button>
</form>

<?php include 'footer.php'; ?>


</body>
</html>
