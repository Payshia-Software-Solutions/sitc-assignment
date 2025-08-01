<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "student_hub";
$database_error = "";


/* Attempt to connect to MySQL database */
$link = mysqli_connect($server, $username, $password, $database);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    $database_error = "Connected to the Server";
}

// PDO
try {
    // Set up the PDO connection
    $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If connection is successful
    $database_error = "Connected to the Server";
} catch (PDOException $e) {
    // If connection fails, display error message
    $database_error = "Connection failed: " . $e->getMessage();
}
