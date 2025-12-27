<?php
require_once '../config/db.php';

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the delete button is clicked
if (isset($_POST['delete_post'])) {
    $post_id_to_delete = $_POST['car_id'];

    $sql_delete = "DELETE FROM cars WHERE car_id = ?";
    $stmt_delete = $connection->prepare($sql_delete);
    $stmt_delete->bind_param("i", $post_id_to_delete);
    $stmt_delete->execute();

    // Refresh the page after deletion
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

$sql = "SELECT * FROM cars ORDER BY car_id DESC"; 
$result = $connection->query($sql);

$posts = array(); // An array to store post data

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <link rel="stylesheet" type="text/css" href="tposts.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="admin_crud_cars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header>
    <h1>DHAKA METRO GA</h1>
    <nav>
        <a href="../home.php">Home</a>
        <a href="../posts_with_search.php">Posts</a>
        <!-- <a href="admin_login.php">Admin</a>
        <a href="login.php">Signin</a>
        <a href="register.php">Register</a> -->
    </nav>
</header>

<h2>CARS</h2>

<div class="post-container">
    <?php foreach ($posts as $post) { ?>
        <div class="post">
            <div class="car_model"><?php echo $post["car_model"]; ?></div>
 <div class="car_image">     <?php echo '<img src="../uploads/' . $post['car_image'] . '" height="300" width="500">'; ?> </div>
            <div class="car_description"><?php echo $post["car_description"]; ?></div>
            <!-- Add delete button with a form for each post -->
            <form method="post" action="">
                <input type="hidden" name="car_id" value="<?php echo $post['car_id']; ?>">
                <button type="submit" name="delete_post" class="delete-btn"><i class="fas fa-trash"></i></button>
            </form>
        </div>
    <?php } ?>
</div>

<br>
<br>
<br>

</body>
</html>
