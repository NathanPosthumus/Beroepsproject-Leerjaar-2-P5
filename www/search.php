<?php session_start(); 

if (!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Project 7 - Pets - De Vrolijke Viervoeter</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'nav.php'; ?>

<form action="search_process.php" method="GET">
    <label for="zoekterm">Zoek op naam</label>
    <input type="text" name="zoekterm" id="zoekterm" placeholder="Zoek op naam">
    <button type="submit">Zoek!</button>
</form>

</body>
</html>
