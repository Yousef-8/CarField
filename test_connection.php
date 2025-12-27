<?php
// Database configuration
$servername = "localhost"; // or "127.0.0.1" if "localhost" doesn’t work
$username = "root"; // replace with your MySQL username
$password = "MySQL2025"; // replace with your MySQL password
$database = "carfield_database"; // replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the database!";

// Close the connection
$conn->close();
