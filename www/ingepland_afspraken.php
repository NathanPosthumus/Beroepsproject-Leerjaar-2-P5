<?php
session_start();
include 'database.php';

$sql = "SELECT *
    FROM appointments
    WHERE status='gepland' AND patient_id IS NOT NULL
    ORDER BY appointment_date, appointment_time";

$result = mysqli_query($conn, $sql);
$appointments = $result ? mysqli_fetch_all($result, MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingepland Afspraken</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h2>Ingeplande afspraken</h2>

<?php if (empty($appointments)) { ?>
    <p>Geen ingeplande afspraken.</p>
    
<?php } else { ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Patient ID</th>
            <th>E-Mail</th>
        </tr>

        <?php foreach ($appointments as $a) { ?>
            <tr>
                <td><?php echo $a['appointment_date']; ?></td>
                <td><?php echo $a['appointment_time']; ?></td>
                <td><?php echo $a['patient_id']; ?></td>
                <td>
                    <?php
                    $patient_name = "Unknown";
                    if (!empty($a['patient_id'])) {
                        $sql = "SELECT email FROM users WHERE id = " . $a['patient_id'];
                        $result = mysqli_query($conn, $sql);
                        $patient = mysqli_fetch_assoc($result);
                        if ($patient) {
                            $patient_email = $patient['email'];
                        }
                    }
                    echo $patient_email;
                    ?>
            </tr>
        <?php } ?>
    </table>
<?php } ?>


    
<?php include 'footer.php'; ?>
</body>
</html>