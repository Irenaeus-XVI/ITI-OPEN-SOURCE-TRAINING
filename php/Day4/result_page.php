<!-- result_page.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Employee Data</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Employee Data</h2>
        <?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'k2';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass);

        if (!$conn) {
            die('Could not connect: ' . mysqli_error($conn));
        }

        mysqli_select_db($conn, $dbname);

        $sql = 'SELECT emp_id, emp_name, emp_email, gender, emp_status FROM emp6';
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Could not get data: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            // Use Bootstrap table classes to style the table
            echo '<table class="table table-bordered">';
            echo '<thead class="thead-dark"><tr><th>EMP ID</th><th>EMP NAME</th><th>EMP EMAIL</th><th>GENDER</th><th>STATUS</th></tr></thead><tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                $gender = ($row['gender'] == 1) ? 'Male' : 'Female';
                $status = ($row['emp_status'] == 1) ? 'Active' : 'Inactive';

                // Add link to the user details page passing the emp_id as a parameter
                echo "<tr><td>{$row['emp_id']}</td><td><a href='user_details.php?emp_id={$row['emp_id']}'>{$row['emp_name']}</a></td><td>{$row['emp_email']}</td><td>$gender</td><td>$status</td></tr>";
            }

            echo '</tbody></table>';
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>

</html>