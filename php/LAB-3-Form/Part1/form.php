<!DOCTYPE html>
<html>

<head>
    <title>Student Registration Form</title>
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>
    <h2>Student Registration Form</h2>

    <?php
    // Initialize the errors array
    $errors = array();

    // Check if the form is submitted
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $group_id = $_POST["group_id"];
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $course = isset($_POST["course"]) ? $_POST["course"] : array();
        $agree = isset($_POST["agree"]) ? "Yes" : "No";

        // Check for empty fields
        if (empty($name)) {
            $errors["name"] = "Name is required.";
        }
        if (empty($email)) {
            $errors["email"] = "Email is required.";
        }
        if (empty($group_id)) {
            $errors["group_id"] = "Group ID is required.";
        }
        if (empty($gender)) {
            $errors["gender"] = "Gender is required.";
        }
        if (empty($course)) {
            $errors["course"] = "At least one course must be selected.";
        }
        if (empty($agree)) {
            $errors["agree"] = "You must agree to the terms and conditions.";
        }
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div>
            <label for="name">Name<span class="error">*</span>:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
            <?php if (isset($errors["name"])) {
                echo "<p class='error'>" . $errors["name"] . "</p>";
            } ?>
        </div>

        <div>
            <label for="email">Email<span class="error">*</span>:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <?php if (isset($errors["email"])) {
                echo "<p class='error'>" . $errors["email"] . "</p>";
            } ?>
        </div>

        <div>
            <label for="group_id">Group ID<span class="error">*</span>:</label>
            <input type="text" id="group_id" name="group_id" value="<?php echo isset($_POST['group_id']) ? $_POST['group_id'] : ''; ?>">
            <?php if (isset($errors["group_id"])) {
                echo "<p class='error'>" . $errors["group_id"] . "</p>";
            } ?>
        </div>

        <div>
            <label>Gender<span class="error">*</span>:</label>
            <input type="radio" id="male" name="gender" value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'male') ? 'checked' : ''; ?>>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'female') ? 'checked' : ''; ?>>
            <label for="female">Female</label>
            <?php if (isset($errors["gender"])) {
                echo "<p class='error'>" . $errors["gender"] . "</p>";
            } ?>
        </div>

        <div>
            <label for="course">Select Course<span class="error">*</span>:</label>
            <select id="course" name="course[]" multiple>
                <option value="math" <?php echo (isset($_POST['course']) && in_array('math', $_POST['course'])) ? 'selected' : ''; ?>>Math</option>
                <option value="science" <?php echo (isset($_POST['course']) && in_array('science', $_POST['course'])) ? 'selected' : ''; ?>>Science</option>
                <option value="history" <?php echo (isset($_POST['course']) && in_array('history', $_POST['course'])) ? 'selected' : ''; ?>>History</option>
                <!-- Add more options here -->
            </select>
            <?php if (isset($errors["course"])) {
                echo "<p class='error'>" . $errors["course"] . "</p>";
            } ?>
        </div>

        <div>
            <label for="agree">Agree to Terms<span class="error">*</span>:</label>
            <input type="checkbox" id="agree" name="agree" <?php echo (isset($_POST['agree']) && $_POST['agree'] === 'on') ? 'checked' : ''; ?>>
            <label for="agree">I agree to the terms and conditions.</label>
            <?php if (isset($errors["agree"])) {
                echo "<p class='error'>" . $errors["agree"] . "</p>";
            } ?>
        </div>

        <label for="submit"></label>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Display the success message outside the form submission check
    if (isset($_POST["name"]) && count($errors) === 0) {
        echo "<div class='success'>";
        echo "Welcome " . $name . "<br />";
        echo "Email: " . $email . "<br />";
        echo "Group ID: " . $group_id . "<br />";
        echo "Gender: " . $gender . "<br />";
        echo "Selected Course(s): " . implode(", ", $course) . "<br />";
        echo "Agree to Terms: " . $agree . "<br />";
        echo "</div>";
        exit(); // Stop further execution of the page
    }
    ?>
</body>

</html>