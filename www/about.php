<?php session_start(); 

if (!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Project 7 - Pets - De Vrolijke Viervoeter</title>
    <link rel="stylesheet" href="style-about.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <?php include 'nav.php'; ?>

    <h1>About</h1>


    <p class="introduction">
        Deze website is gemaakt als een schoolproject voor een dierenasiel.
        Het doel is eenvoudig: bezoekers kunnen hier dieren bekijken die op zoek
        zijn naar een nieuw thuis en meer informatie lezen over hun achtergrond,
        karakter en verzorging.
    </p>

    <p class="introduction">
        Daarnaast laat deze site zien hoe technologie kan helpen bij adoptie.
        We willen het makkelijker maken om de juiste match te vinden en mensen
        te informeren over adoptie, vrijwilligerswerk en hoe je het asiel kunt
        ondersteunen.
    </p>

    <img src="images/pet.jpg" alt="Album cover">

</body>
</html>
