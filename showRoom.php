<?php
session_start();
$username = $_SESSION["USERNAME"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Room List - Marriott Hotel</title>
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
                <?php if (isset($_SESSION["NAME"])) : ?>
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

    <?php
    include 'helper/connection.php';
    ?>
    <div class="container" style="padding-top: 60px; padding-bottom: 20px">
        <h3>Room Data</h3>
        <table class="table table-stripped table-hover datatab">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Room Code</th>
                    <th>Room type</th>
                    <th>Class</th>
                    <th>Picture</th>
                    <th>Rates</th>
                    <th>Status</th>
                    <th>Booking</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "select * from tb_room";
                $query = oci_parse($con, $sql);
                $r1 = oci_execute($query);
                $no = 1;
                while ($data = oci_fetch_assoc($query)) 
                {
                    $image = $data["PICTURE"];
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data["ROOM_CODE"]; ?></td>
                        <td><?php echo $data["ROOM_NAME"]; ?></td>
                        <td><?php echo $data["CLASS"]; ?></td>
                        <?php echo "<td>" . "<img src='img/" . $image . "' width='150'  height='auto'>" . "</td>"; ?>
                        <td><?php echo $data["RATE"]; ?></td>
                        <td><?php echo $data["STATUS"]; ?></td>
                        <?php $room_code = $data["ROOM_CODE"]; echo " <td> <a href='formInsertReservation.php?id=$room_code' class='btn btn-warning'>Book Room</a> </td>"; ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>