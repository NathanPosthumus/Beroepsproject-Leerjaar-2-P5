<nav>
<?php
include 'database.php';

if (isset($_SESSION['email'])) {
    $sql = "SELECT booked FROM users WHERE email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
}
?>

<ul>
    <li class="css-header-nav"><a href="index.php">Online Tandarts Platform</a></li>
    <li><a href="index.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="educatief_materiaal.php">Educatief Materiaal</a></li>

    <!-- // Alleen tonen als er geen sessie is (niet ingelogd) -->
<?php if (!isset($_SESSION['role'])): ?>

    <li><a href="register.php">Sign up</a></li>
    <a href="login.php"><li class="login-button-css"> Login</li></a>

<?php else: ?>

    

    <?php if ($_SESSION['role'] === 'patient'): ?>
        <li><a href="tandarts_lijst.php">Tandarts Lijst</a></li>
        <li><a href="patient-dashboard.php">Patient Dashboard</a></li>

        
            <li><a href="book_appointment.php">Book Appointment</a></li>
      

       
            <li><a href="booked_appointments.php">Booked Appointments</a></li>

    <?php endif; ?>

    <?php if ($_SESSION['role'] === 'dentist'): ?>
        <li><a href="patienten_lijst.php">Patienten Lijst</a></li>
        <li><a href="tandarts-dashboard.php">Dentist Dashboard</a></li>
        <li><a href="ingepland_afspraken.php">Ingepland Afspraken</a></li>
    <?php endif; ?>

    <li class="login-button-css"><a href="logout.php">Logout</a></li>


<?php endif; ?>
</ul>
</nav>
