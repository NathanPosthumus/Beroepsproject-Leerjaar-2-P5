<?php session_start(); ?>

<?php if (isset($_GET['error']) && $_GET['error'] == 'email_exists') { ?>
    <script>alert("Email bestaat al. kies een ander.");</script>
<?php } ?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<h1>Register</h1>

<form action="process_register.php" method="POST">
    <p>
        <label for="email">email:</label><br>
        <input type="text" id="email" name="email" required>
    </p>

    <p>
        <label for="password">password:</label><br>
        <input type="text" id="password" name="password" required>
    </p>

    <button type="submit">Submit</button>
</form>

<?php include 'footer.php'; ?>

</body>
</html>
