<?php

$dbhost = 'mariadb';
$dbname = 'Pet_Shelter_DB';
$dbuser = 'root';
$dbpass = 'password';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
}

?>
