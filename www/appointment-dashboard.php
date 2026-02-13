<?php
session_start();
include "database.php";

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

    <?php foreach ($appointments as $row) { ?>

        <?php
        // Default email
        $user_email = "Unknown";

        // Only try to fetch if patient_id exists
        if (!empty($row['patient_id'])) {

            // Get the user who booked this appointment
            $sql_user = "SELECT email FROM users WHERE id = " . $row['patient_id'];
            $result_user = mysqli_query($conn, $sql_user);

            // Fetch user data
            $user_data = mysqli_fetch_assoc($result_user);

            // If a user exists, use their email
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
<h3>Nieuwe afspraak?</h3>

<button action="appointment-info-update.php"><a href="book_appointment.php">Maak een nieuwe afspraak</a></button>

<?php include 'footer.php'; ?>

</body>
</html>
