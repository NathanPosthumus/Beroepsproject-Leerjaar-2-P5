<?php
session_start();

//simpele check, kijken of email al bestaat om duble accunts te voorkomen
if (isset($_POST['email'])) {

    include 'database.php';

    $email = $_POST['email'];

    $sql_check = "SELECT * FROM users WHERE email='$email'";
    $result_check = mysqli_query($conn, $sql_check);

    $user = mysqli_fetch_assoc($result_check);

    if ($user) {
        // email bestaat al stuur terug met id om error te laten zien
        header("Location: register.php?error=email_exists");
        exit;
    }
}

// check of de form data is verzonden
//checks

if (
    !isset($_POST['email'], $_POST['password'])
) {
    die("Form data not submitted properly.");
}

// check of niks leeg is
if (
    empty($_POST['email']) ||
    empty($_POST['password'])
) {
    die("Please fill in all required fields.");
}

$email = $_POST['email'];
$password = $_POST['password'];

include 'database.php';

$sql = "INSERT INTO users (email, password, role, created_at)
        VALUES ('$email', '$password', 'patient', NOW())";

if (mysqli_query($conn, $sql)) {

    
    $_SESSION['email'] = $email;
    $_SESSION['role'] = 'patient';
    $_SESSION['password'] = $password;
    $_SESSION['created_at'] = date('Y-m-d H:i:s');

    header("Location: index.php");
    exit;

} else {
    echo "Error inserting user: " . mysqli_error($conn);
}
?>
