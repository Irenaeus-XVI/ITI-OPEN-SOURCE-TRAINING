<?php
//create db & select
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'k2';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
   die('Could not connect: ' . mysqli_error($conn));
}

// Check if the database exists before attempting to create it
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$retval = mysqli_query($conn, $sql);

if (!$retval) {
   die('Could not create database: ' . mysqli_error($conn));
}

//select
mysqli_select_db($conn, $dbname);
?>

<?php
//create db TABLE
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'k2';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
   die('Could not connect: ' . mysqli_error($conn));
}

//select
mysqli_select_db($conn, $dbname);

// create table only if it does not exist
$sql = 'CREATE TABLE IF NOT EXISTS emp6(
   emp_id INT NOT NULL AUTO_INCREMENT,
   emp_name VARCHAR(20) NOT NULL,
   emp_email VARCHAR(50) NOT NULL,
   join_date TIMESTAMP(6) NOT NULL,
   gender BOOLEAN NOT NULL,
   emp_status BOOLEAN NOT NULL,
   PRIMARY KEY (emp_id)
)';

$retval = mysqli_query($conn, $sql);

if (!$retval) {
   die('Could not create table: ' . mysqli_error($conn));
}
?>

<?php
//insert data to TABLE
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'k2';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
   die('Could not connect: ' . mysqli_error($conn));
}

//select
mysqli_select_db($conn, $dbname);

//NOTE - Get Value From The Form 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $emp_name = $_POST['emp_name'];
   $emp_email = $_POST['emp_email'];
   $gender = (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 1 : 0;
   $emp_status = (isset($_POST['status']) && $_POST['status'] == 'Active') ? 1 : 0;

   // Format the current date for the TIMESTAMP column
   $join_date = date("Y-m-d H:i:s");

   // Insert data into the table
   $sql = "INSERT INTO emp6 (emp_name, emp_email, join_date, gender, emp_status) 
           VALUES ('$emp_name', '$emp_email', '$join_date', $gender, $emp_status)";

   $retval = mysqli_query($conn, $sql);

   if (!$retval) {
      die('Could not insert data: ' . mysqli_error($conn));
   }
   header("Location: result_page.php");
   exit();
}
mysqli_close($conn);
?>
