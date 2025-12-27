<?php
require_once '../config/db.php';
session_start();
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$username = $_POST['admin_username'];
$password = $_POST['admin_password'];

$query = "SELECT * FROM admins WHERE admin_username='$username' AND admin_password='$password'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) { //=1 because to ensure that only 1 row data(username and pass) for login 
    $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_username'] = $username;
        header("Location: admin_page.php"); // Redirect to a admin page
    } 


else {
    echo "User not found.";
    header("Location: admin_login.php");
}

mysqli_close($connection);
?>
