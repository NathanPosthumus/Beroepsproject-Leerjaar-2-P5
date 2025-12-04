<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style-nav.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <h1>Register</h1>
    <form action="process_register.php" method="POST">
        <label for="firstname">firstname:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">lastname:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="email">email:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="username">username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">password:</label>
        <input type="password" id="password" name="password" required><br><br>



        <button type="submit">submit</button>
    </form>
</body>
</html>