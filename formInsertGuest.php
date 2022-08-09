<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insert Guest</title>
    <link rel="shortcut icon" type="image/png" href="img/mlogo1.png" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


</head>

<body style="background-color: grey">
    <nav class="navbar navbar-expand-sm bg-light navbar-light content-center fixed-top" style="height : 100px">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/mlogo2.png" style="width: 20%"></a>
            <ul class="navbar-nav" style="font-size: 20px">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="padding-right: 35px">Home</a>
                </li>
                <?php if (isset($_SESSION["NAME"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="formGuestHistory.php">History</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>

    </nav>

    <div class="container">
        <div class="insertGuest-form">
            <div class="main-div">
                <h4 style="margin-top:135px; color: white; text-align: center">W E L C O M E !</h4>
                <h3 style="color: white; text-align: center">Fill in your data</h3><br>
                <form action="process/processInsertGuest.php" method="POST">
                    <div class="container" style="color: white">
                        <div class="form-group">
                            <label>Full name</label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" value="F">Female
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="gender" value="M">Male
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label>Contact No</label>
                            <input type="text" name="contact_no" class="form-control" placeholder="Contact No">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" name="submit" value="Submit">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <br><br>
</body>

</html>