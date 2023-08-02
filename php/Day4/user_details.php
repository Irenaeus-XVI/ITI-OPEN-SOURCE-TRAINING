<!-- user_details.php -->

<!DOCTYPE html>
<html>

<head>
    <title>User Details</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>User Details</h2>
        <?php
        if (isset($_GET['emp_id'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'k2';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

            if (!$conn) {
                die('Could not connect: ' . mysqli_error($conn));
            }

            mysqli_select_db($conn, $dbname);

            $emp_id = $_GET['emp_id'];
            $sql = "SELECT emp_id, emp_name, emp_email, gender, emp_status FROM emp6 WHERE emp_id = $emp_id";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die('Could not get data: ' . mysqli_error($conn));
            }

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $gender = ($row['gender'] == 1) ? 'Male' : 'Female';
                $status = ($row['emp_status'] == 1) ? 'Active' : 'Inactive';

                echo "<table class='table table-bordered'>
                    <tr><th>EMP ID</th><td>{$row['emp_id']}</td></tr>
                    <tr><th>EMP NAME</th><td>{$row['emp_name']}</td></tr>
                    <tr><th>EMP EMAIL</th><td>{$row['emp_email']}</td></tr>
                    <tr><th>GENDER</th><td>$gender</td></tr>
                    <tr><th>STATUS</th><td>$status</td></tr>
                </table>";
            } else {
                echo "User not found.";
            }

            mysqli_close($conn);
        } else {
            echo "Invalid request. Please provide a valid emp_id.";
        }
        ?>
    </div>
</body>

</html>