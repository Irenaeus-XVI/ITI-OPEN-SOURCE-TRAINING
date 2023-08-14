<?php
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'status' => 'CMS'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'status' => 'OS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'status' => 'OS'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'status' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'status' => 'OS'],
];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Custom style for OS status */
        .os-status {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <h2>Student Table</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        <?php foreach ($students as $student) : ?>
            <tr>
                <td><?php echo $student['name']; ?></td>
                <td><?php echo $student['email']; ?></td>
                <td <?php if ($student['status'] === 'OS') : ?>class="os-status" <?php endif; ?>>
                    <?php echo $student['status']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>