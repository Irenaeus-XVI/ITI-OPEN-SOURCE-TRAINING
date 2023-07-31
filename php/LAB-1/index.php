<?php
define('WEBSITE_NAME', "Ehab's Website");
echo WEBSITE_NAME . "<br/><br/>";

// Server Name
$serverName = $_SERVER['SERVER_NAME'];
echo "Server Name: " . $serverName . "<br/><br/>";

// Server Address
$serverAddress = $_SERVER['SERVER_ADDR'];
echo "Server Address: " . $serverAddress . "<br/><br/>";

// Server Port
$serverPort = $_SERVER['SERVER_PORT'];
echo "Server Port: " . $serverPort . "<br/><br/>";

// Current Script Filename and Path
$currentScriptFilename = __FILE__;
$currentScriptPath = __DIR__;
echo "Currently executing script filename: " . $currentScriptFilename . "<br/>";
echo "Currently executing script path: " . $currentScriptPath . "<br/><br/>";

// Brother's Age
$brotherAge = 10;

// Check the age using switch case
switch ($brotherAge) {
    case ($brotherAge < 5):
        echo "Stay at home";
        break;
    case 5:
        echo "Go to Kindergarten";
        break;
    case ($brotherAge >= 6 && $brotherAge <= 12):
        echo "Go to grade: " . $brotherAge;
        break;
    default:
        echo "Age is outside the specified range";
}
