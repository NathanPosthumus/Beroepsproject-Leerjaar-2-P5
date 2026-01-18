<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h1>Login</h1>

<form action="login_process.php" method="POST">
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
