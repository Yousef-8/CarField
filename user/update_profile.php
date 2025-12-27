<?php
require_once '../config/db.php';
session_start();
error_reporting(E_ERROR | E_PARSE);

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $username = $_POST['username'];
    $newPassword = $_POST['password'];


    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }





    // Update the password if a new one is provided
    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); //PASSWORD_DEFAULT algorithm is used which is now Bcrypt
        $update_password_query = "UPDATE users SET password='$hashedPassword' WHERE username='" . $_SESSION['username'] . "'";
        mysqli_query($connection, $update_password_query);
    }

    // Update the profile image if a new one is uploaded
    if ($_FILES['profile_image']['error'] == 0) {
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($_FILES['profile_image']['name']);
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_file);

        $update_image_query = "UPDATE users SET profile_image='" . basename($_FILES['profile_image']['name']) . "' WHERE username='" . $_SESSION['username'] . "'";
        mysqli_query($connection, $update_image_query);
    }

    $connection->close();

    header('Location: login.php');
    // Redirect to the login page after updating
    exit;
} else {
    header('Location: profile.php'); // Redirect to the profile page if the form is not submitted
    exit;
}
?>
