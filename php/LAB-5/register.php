<?php

include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userConfirmPassword = $_POST['userConfirmPassword'];

    // Perform validation 
    if (empty($userName) || empty($userEmail) || empty($userPassword) || empty($userConfirmPassword)) {
        echo "Please fill in all the fields.";
    } elseif ($userPassword !== $userConfirmPassword) {
        echo "Passwords do not match.";
    } else {
        // All validation passed, proceed with registration
        // You should also hash and salt the password before storing it in the database
        // For simplicity, I'll just assume the table has 'username', 'email', and 'password' columns
        $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

        // Select the database
        mysqli_select_db($conn, "user_db");

        // Create table if not exist 
        $query = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL,
            password VARCHAR(255) NOT NULL
        );";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // Now that the table is created or exists, proceed with user registration
            $query = "INSERT INTO users (username, email, password) VALUES ('$userName', '$userEmail', '$hashedPassword')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "Registration successful. You can now log in.";
                header("Location:login.php");
            } else {
                echo "Error occurred. Please try again later.";
            }
        }
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container py-5">
        <form method="post" action="register.php">
            <label for="" class="">Name</label>
            <input type="text" name="userName" id="" class="form-control mb-2">

            <label for="" class="">Email</label>
            <input type="text" name="userEmail" id="" class="form-control  mb-2">


            <label for="" class="">Password</label>
            <input type="password" name="userPassword" id="" class="form-control  mb-2">

            <label for="" class="">Confirm Password</label>
            <input type="password" name="userConfirmPassword" id="" class="form-control  mb-2">


            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>

</html>