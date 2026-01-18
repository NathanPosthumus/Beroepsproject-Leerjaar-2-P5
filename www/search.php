<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<form action="search_process.php" method="GET">
    <p>
        <label for="zoekterm">Zoek op album:</label><br>
        <input type="text" id="zoekterm" name="zoekterm" placeholder="Zoek op album" required>
    </p>
    <button type="submit">Zoek!</button>
</form>

</body>
</html>
