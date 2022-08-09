<?php
session_start();
$username = $_SESSION["USERNAME"];
?>

<?php
include 'helper/connection.php';

$room_code = $_GET["id"];

$query = "SELECT * FROM tb_room WHERE room_code = '$room_code'";
$result = oci_parse($con, $query);
oci_execute($result);
$item = '';

$item = oci_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mariott Hotel</title>
    <link rel="shortcut icon" type="image/png" href="img/mlogo1.png" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link href="admin/css/main_page.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light content-center fixed-top" style="height : 100px">
        <div class="container">
            <a class="navbar-brand" href="profile.php"><img src="img/mlogo2.png" style="width: 20%"></a>
            <ul class="navbar-nav" style="font-size: 20px">
                <li class="nav-item">
                    <a class="nav-link" href="profile.php" style="padding-right: 35px">Home</a>
                </li>
                <?php if (isset($_SESSION["USERNAME"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="formGuestHistory.php" style="padding-right: 35px">History</a>
                    </li>
                <?php else : ?>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link" style="padding-right: 35px; color: green"><?php echo $username; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>

    </nav>

    <form action="process/processInsertReservation.php" method="POST">
        <div class="container">
            <h3 style="margin-top:70px;">Reservation Form</h3><br>
            <div class="form-group">
                <label>Guest Name :</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Address :</label>
                <input type="text" name="address" class="form-control">
            </div>

            Room :
            <select name="room_name" readonly="true">
                <option value="<?php echo $item['ROOM_CODE'] ?>"><?php echo $item['ROOM_NAME'] ?></option>;
            </select><br>
            <input type="hidden" name="rate" value="<?= $item['RATE'] ?>">
            <br>
            Facilities :
            <select name="facilities">
                <?php
                include "helper/connection.php";
                $sql = "select * from tb_facilities";
                $result = oci_parse($con, $sql);
                $r1 = oci_execute($result);

                while ($show = oci_fetch_array($result, OCI_NUM)) {
                ?>
                    <option value="<?php echo $show[0] ?>"><?php echo $show[1] ?></option>;
                <?php
                }
                ?>

            </select><br />
            <div class="form-group">
                <br>
                <label>Check In Date</label>
                <input type="date" name="date_ci" class="form-control" id="date1" placeholder="Check In Date">
            </div>
            <div class="form-group">
                <label>Check Out Date</label>
                <input type="date" name="date_co" class="form-control" id="date2" placeholder="Check Out Date">
            </div>

            <div class="form-group">
                <label>Stay Duration</label>
                <input type="number" name="stay_duration" id="stay_duration" class="form-control" placeholder="Stay Duration">
            </div>
            <div>
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
            </div>
            <br>
            <br>
        </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</body>

</html>