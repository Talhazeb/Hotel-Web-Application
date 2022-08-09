<!DOCTYPE html>
<html lang="en">
<head>
<title>Insert Employee</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
    <form action="process/processInsertEmployee.php" method="POST">
        <div class="container">
            <h3>Form insert Employee</h3>
            <div class="form-group">
                <label>Employee ID</label>
                <input type="text" name="emp_id" class="form-control" placeholder="Emp_id">
            </div>
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Fullname">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Job</label>
                <input type="text" name="job" class="form-control" placeholder="Job">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
            <div class="form-group">
                <label>Contact No</label>
                <input type="text" name="contact_no" class="form-control" placeholder="Contact No">
            </div>
            <input type="hidden" name="level" value="1" ><br/>
            <div>
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
            </div>
        </div>
    </form>
</body>
</html>