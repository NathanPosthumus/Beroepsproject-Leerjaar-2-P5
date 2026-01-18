<?php session_start(); ?>

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
        <label for="firstname">Firstname:</label><br>
        <input type="text" id="firstname" name="firstname" required>
    </p>

    <p>
        <label for="lastname">Lastname:</label><br>
        <input type="text" id="lastname" name="lastname" required>
    </p>

    <p>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required>
    </p>

    <p>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required>
    </p>

    <p>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required>
    </p>

    <button type="submit">Submit</button>
</form>

</body>
</html>
