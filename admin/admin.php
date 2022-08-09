<?php
    session_start();
    $username = $_SESSION["NAME"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin Marriott Hotel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Marriott Hotel</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="formInsertFacilities.php" target="iframe_a">Insert Facilities</a>
                </li>
                <li>
                    <a href="formInsertEmployee.php" target="iframe_a">Insert Employee</a>
                </li>
                <li>
                    <a href="showGuest.php" target="iframe_a">Guest Data</a>    
                </li>
                <li>
                    <a href="showRoom.php" target="iframe_a">Room Data</a>
                </li>
                <li>
                    <a href="showEmployee.php" target="iframe_a">Employee Data</a>
                </li>
                <li>
                    <a href="showFacilities.php" target="iframe_a">Facilities Data</a>
                </li>
                <li>
                    <a href="showReservation.php" target="iframe_a">Reservation Data</a>
                </li>
                <li>
                    <a href="showPayment.php" target="iframe_a">Payment Data</a>
                </li>
            </ul>
        </nav>

        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <p class="nav-link">Admin <?php echo $username; ?><p>
                            </li>
                            <li class="nav-item active">
                                <p><a class="nav-link" href="process/logout.php">Logout</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <h2>Welcome To Admin Portal<h2>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</body>

</html>
