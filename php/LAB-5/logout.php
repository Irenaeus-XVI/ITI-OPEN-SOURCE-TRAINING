<?php
// logout.php

session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Clear any cookies associated with the user
setcookie('userName', '', time() - 3600);

// Redirect the user to the login page after logout
header('Location: login.php');
exit();
