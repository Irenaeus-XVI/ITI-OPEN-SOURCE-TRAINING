<?php
// home.php

session_start();
if (!isset($_SESSION['user_name'])) {
    // If the user is not logged in, redirect them to the login page
    header('Location: login.php');
    exit();
}

// If the user is logged in, get their username from the session
$userName = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional styles for the content */



        .box-shadow-5 {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-8 bg-info d-flex align-items-center py-5 rounded box-shadow-5">
                <div class="content text-white p-5">
                    <h1 class="display-4">HOME</h1>
                    <h2>Hello <?php echo $userName ?> </h2>
                </div>
            </div>
        </div>

    </div>

</body>

</html>