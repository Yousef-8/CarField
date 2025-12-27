<?php
$host = "localhost";
$user = "";        // your Database username
$password = "";        // your Database password
$database = "carfield_database";

// Create connection
$connection = new mysqli($host, $user, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
