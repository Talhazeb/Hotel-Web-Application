<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Reservation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <?php
    include 'helper/connection.php';
    ?>


    <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
        <h3>Data Reservation</h3>
        <hr>

        <div class="container">
            <table class="table" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Reservation</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Room Code</th>
                        <th>Facility Type</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Stay Duration</th>
                        <th>Total Bill</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "select * from tb_reservation";
                    $query = oci_parse($con, $sql);
                    oci_execute($query);
                    $no = 1;
                    while ($data = oci_fetch_assoc($query)) {
                    ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['ID_RESERVATION']; ?></td>
                            <td><?php echo $data['NAME']; ?></td>
                            <td><?php echo $data['ADDRESS']; ?></td>
                            <td><?php echo $data['ROOM_CODE']; ?></td>
                            <td><?php echo $data['ID_FACILITIES']; ?></td>
                            <td><?php echo $data['CHECK_IN_DATE']; ?></td>
                            <td><?php echo $data['CHECK_OUT_DATE']; ?></td>
                            <td><?php echo $data['STAY_DURATION']; ?></td>
                            <td><?php echo $data['TOTAL_BILL']; ?></td>
                            <td>

                                <?php
                                $id_reservasi = $data["ID_RESERVATION"];
                                echo "<a href='process/deleteReservation.php?id=$id_reservasi' class='btn btn-danger'>Delete</a>";
                                ?>
                            </td>
                        </tr>


                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>