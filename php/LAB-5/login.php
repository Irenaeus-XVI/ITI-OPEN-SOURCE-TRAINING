<?php
// login.php

include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    // Select database
    mysqli_select_db($conn, "user_db");

    // Retrieve user data from the database based on the entered email
    $query = "SELECT * FROM users WHERE email = '$userEmail'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
        $hashedPassword = $userData['password'];

        // Verify the entered password against the hashed password
        if (password_verify($userPassword, $hashedPassword)) {
            session_start();
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_name'] = $userData['username'];
            setcookie('userName', $userData['username'], time() + 60);
            header('Location: home.php');
            exit();
        } else {
            // Password does not match, display a generic error message
            echo "Invalid email or password.";
        }
    } else {
        // User with the entered email not found, display a generic error message
        echo "Invalid email or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container py-5">
        <h1>LOGIN</h1>
        <form method="post" action="">
            <!-- Set the action attribute to empty to submit to the current URL -->

            <label for="">Email</label>
            <input type="text" name="userEmail" class="form-control mb-2">

            <label for="">Password</label>
            <input type="password" name="userPassword" class="form-control mb-2">

            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
    </div>

</body>

</html>