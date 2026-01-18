<?php

$dbhost = 'mariadb';
$dbname = 'music';
$dbuser = 'root';
$dbpass = 'password';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed");
}

?>
