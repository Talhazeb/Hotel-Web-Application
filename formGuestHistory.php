<?php
session_start();
include 'helper/connection.php';
$username = $_SESSION["USERNAME"];
?>


<!DOCTYPE html>

<head>
    <title>Mariott Hotel</title>
    <link rel="shortcut icon" type="image/png" href="img/mlogo1.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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

    <section class="guest">
        <div class="container">
            <h3 style="margin-top:130px;">Order History</h3><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <tr>
                        <th>No</th>
                        <th>Orderer Name</th>
                        <th>Room</th>
                        <th>Facility Type</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Stay Duration</th>
                        <th>Total Bill</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $id_customer = $_SESSION["NAME"];

                    $sql = "select r.id_reservation, r.name, f.facility_type, m.room_name, r.check_in_date, r.check_out_date, r.stay_duration, r.total_bill 
                    from tb_reservation r JOIN tb_facilities f
                    ON r.id_facilities = f.id_facilities
                    JOIN  tb_room m
                    ON r.room_code = m.room_code
                    where r.name = '" . $id_customer . "'";

                    $query = oci_parse($con, $sql);
                    oci_execute($query);


                    while ($data = oci_fetch_array($query, OCI_BOTH)) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['NAME']; ?></td>
                            <td><?php echo $data['ROOM_NAME']; ?></td>
                            <td><?php echo $data['FACILITY_TYPE']; ?></td>
                            <td><?php echo $data['CHECK_IN_DATE']; ?></td>
                            <td><?php echo $data['CHECK_OUT_DATE']; ?></td>
                            <td><?php echo $data['STAY_DURATION']; ?></td>
                            <td>Rs. <?php echo $data['TOTAL_BILL']; ?></td>
                        </tr>
                        <?php $no++; ?>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>