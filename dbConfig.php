<?php

// Connect to the MySQL database using mysqli
$db_server = "localhost"; // Specify the database server (usually localhost)
$db_user = "root"; // Provide the username to access the database
$db_pass = ""; // Enter the password for the database user
$db_name = "castillo"; // Specify the name of the database you want to connect to

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name); // Establish the connection

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // If not, display an error message
}

// Connect to the MySQL database using PDO
$pdo = new PDO($db_server, $db_user, $db_pass, );

// Set the time zone to Asia/Manila (+08:00)
$pdo->exec("SET time_zone = '+08:00';");
?>
