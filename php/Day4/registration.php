<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>registration</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
   <div class="container py-5">
      <form action="db_conn.php" method="post">
         <h2>User Registration Form</h2>
         <p>Please Fill This Form And Submit To Add User Record To The DataBase.</p>
         <label for="">Name</label>
         <input type="text" class="form-control" name="emp_name">

         <label for="">Email</label>
         <input type="text" class="form-control" name="emp_email">
         <label for="">Gender</label>
         <br>

         <input type="radio" name="gender" value="Male" id="male">
         <label for="male">Male</label>
         <br>

         <input type="radio" name="gender" value="Female" id="female">
         <label for="female">Female</label>
         <br>
         <input type="checkbox" name="status" value="Active" id="receive_email">
         <label for="receive_email">Receive Email From Us</label>
         <div>
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-info">Cancel</button>
         </div>
      </form>
   </div>
</body>

</html>
