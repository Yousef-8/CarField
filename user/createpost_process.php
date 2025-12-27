<?php
require_once '../config/db.php';
error_reporting(E_ERROR | E_PARSE);
session_start();

$username = $_SESSION['username'];


if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1️ Get user_id from users table
    $getUserQuery = "SELECT user_id FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $getUserQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
        $uploader_id = $userData['user_id'];   // this is integer
    } else {
        die("Error: User not found in database.");
    }

    // 2️ Collect form data
    $title = $_POST['title'];
    $description = $_POST['post_description'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploads/' . $image;

    // 3️ Insert post with uploader_id (INT)
    $query = "
        INSERT INTO posts (title, post_description, image, post_uploader)
        VALUES ('$title', '$description', '$image', $uploader_id)
    ";

    if (mysqli_query($connection, $query)) {
        move_uploaded_file($image_tmp_name, $image_folder);
        header("Location: ../posts_with_search.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
